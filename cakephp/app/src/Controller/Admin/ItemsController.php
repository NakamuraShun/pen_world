<?php

namespace App\Controller\Admin;

use App\Controller\AppController as App;
use Cake\ORM\TableRegistry;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class ItemsController extends App
{
	public function initialize(): void{

		parent::initialize();
		$this->Categorys = TableRegistry::getTableLocator()->get('Categorys');
		$this->Brands = TableRegistry::getTableLocator()->get('Brands');

	}

	// 独自関数 ////////////////////////////////////////////////

	/** createItemsOptionsメソッド
	* - ファイル名に日本語入っている、拡張子が異なる場合は$erを返す
	* - 問題ない場合はtrueを返す
	* - $file_name = ファイル名
	*/

	// フォーム用オプションデータ
	function createItemsOptions($rows, $keyField, $valueField){
		$array = [];
		foreach ($rows as $Row){
			$array[$Row[$keyField]] = $Row[$valueField];
		}
		return $array;
	}

	/** checkFileメソッド
	* - 問題ない場合はtrueを返す
	* - $fileName       = ファイル名
	* - $countFileNames = ファイル名の配列
	*/

	public function checkFile($fileName, $countFileNames) {
		$er = [];

		//日本語が入ってるか
		if(preg_match("/[ぁ-ん]+|[ァ-ヴー]+|[一-龠]/u", $fileName)){
			$er["jp"] = "日本語のファイル名はアップロードできません";
		}

		//拡張子を調べる
		$ext = substr($fileName, -3); // アップされた画像の拡張子を抜き出す
		if($ext != "jpg" && $ext != "gif" && $ext != "png"){ 
			$er["ext"] = "拡張子はjpgとgifとpng以外はアップロードできません";
		}

		// 重複を確認
		if($countFileNames[$fileName] > 1){
			$er["postDuplication"] = "ファイル名が重複している画像はアップロードできません";
		}

		if(!empty($er)){
			return $er;
		}else{
			return true;
		}
	}

	//////////////////////////////////////////////////////
	
	public function index(){
		
		// pageSettings
		$H1_main = '登録商品一覧';
		$metaData = [
			'title' => '【管理】商品登録一覧',
			'description' => '',
			'keywords' => '',
		];
		$breadCrumb = [
			['name' => '管理画面ホーム', 'controller' => 'home', 'action' => 'index'],
			['name' => '登録商品一覧', 'controller' => '', 'action' => ''],
		];

		$empty_entity = $this->Items->newEmptyEntity();


		// カテゴリオプション
		$categorysRows = $this->Categorys->find('all')->toArray();
		$categorysOptions = $this->createItemsOptions($categorysRows, 'id', 'name');
		// ブランドオプション
		$brandsRows = $this->Brands->find('all')->toArray();
		$brandsOptions = $this->createItemsOptions($brandsRows, 'id', 'name');

		// 全登録商品データ
		$itemsRows = $this->Items->find('all')
		->contain(['Categorys'])
		->contain(['Brands'])
		->order(['position' => 'DESC']) // 優先度が高い順
		->toArray();
		
		// setData
		$this->set(compact('H1_main','metaData','breadCrumb','itemsRows','empty_entity','categorysOptions','brandsOptions'));
	}


	// 登録
	public function insert(){

		if($this->request->is('post')){

			// postデータ
			$post_data = $this->request->getData('Items');

			// intへキャスト
			foreach(['position','price','category_id','brand_id'] as $value) {
				$post_data[$value] = intval($post_data[$value]);
			}
			// image_pathをnull
			for($i = 1; $i < 4; $i++){
				$post_data['image_path_'.$i] = null;
			}

			// 保存
			$insert_entity = $this->Items->newEntity($post_data);
			if($save_entity = $this->Items->save($insert_entity)){
				App::__flash_success('商品が追加されました');
			}else{
				App::__flash_error('商品が追加できませんでした');
				return $this->redirect(['action' => 'index']);
			}

			// 送信ファイル名
			$file_name_1 = $this->request->getData('Items.image_path_1')->getClientFilename();
			$file_name_2 = $this->request->getData('Items.image_path_2')->getClientFilename();
			$file_name_3 = $this->request->getData('Items.image_path_3')->getClientFilename();

			// fileがある場合
			if(!empty(
				$file_name_1 || 
				$file_name_2 || 
				$file_name_3)
			){

				$ers = [];       // エラー配列
				$filePaths = []; // DBに保存するためのファイルパス配列

				$host = $_SERVER["HTTP_HOST"];
				if(strpos($host,'localhost')!== false){
					$dirPath = WWW_ROOT.'img/pages/items/'.$save_entity->id; // 格納先
				}else{
					$dirPath = '/home/xs293869/pen-world.net/public_html/img/pages/items/'.$save_entity->id;
				}

				$countFileNames = array_count_values([$file_name_1,$file_name_2,$file_name_3]); // checkFile()に渡す重複確認用の配列
				
				// ファイル格納
				for($i = 1; $i < 4; $i++){
					if(!empty($this->request->getData('Items.image_path_'.$i)->getClientFilename())){

						$fileData = $this->request->getData('Items.image_path_'.$i);
						$fileName = $this->request->getData('Items.image_path_'.$i)->getClientFilename();

						// エラーチェック
						$errResult = $this->checkFile($fileName, $countFileNames);
						if($errResult !== true){
							$ers[] = $errResult;
							continue; // エラーを記録して次へスキップ
						}

						// ディレクトリ作成
						if(!file_exists($dirPath)){
							$folder = new Folder();
							$folder->create($dirPath);
						}

						// ファイル格納
						$fileData->moveTo($dirPath.'/'.$fileName);

						// パス配列に追加
						$filePaths[] = 'pages/items/'.$save_entity->id.'/'.$fileName;

					}
				}

				// ファイルパス保存
				$target_entity = $this->Items->get($save_entity->id);

				foreach($filePaths as $key => $value){
					$target_entity['image_path_'.($key + 1)] = $value;
				}

				if($this->Items->save($target_entity)){
					if(!empty($ers)){
						$erMsgs = [];
						foreach($ers as $key => $er){
							$count = (string)$key + 1;
							$erMsgs[] = $count.'枚目'.':'.join(' / ', $er);
						}
						$erAllMsgs = join('<br>', $erMsgs);
						App::__flash_error("【画像アップロードエラー】以下理由で画像が登録できませんでした<br>$erAllMsgs");
					}
			
				}else{

					App::__flash_error("【画像アップロードエラー】以下理由で画像が登録できませんでした<br>サーバーエラー");

				}
			}

		}

		return $this->redirect(['action' => 'index']);
	}


	// 編集
	public function update(){

		if($this->request->is('post')){

			// 送信データ
			$post_data = $this->request->getData('Items');

			foreach(['position','price','category_id','brand_id'] as $data) { // intへキャスト
				$post_data[$data] = intval($post_data[$data]);
			}

			// 送信ファイル
			$file_1 = $this->request->getData('Items.image_path_1');
			$file_2 = $this->request->getData('Items.image_path_2');
			$file_3 = $this->request->getData('Items.image_path_3');

			// 送信ファイル名
			$file_name_1 = $file_1->getClientFilename();
			$file_name_2 = $file_2->getClientFilename();
			$file_name_3 = $file_3->getClientFilename();
			
			// checkFile()に渡す重複確認用の配列
			$countFileNames = array_count_values([$file_name_1,$file_name_2,$file_name_3]);

			// ファイル削除フラグ
			$file_del_flg_1 = $this->request->getData('image_delete_1');
			$file_del_flg_2 = $this->request->getData('image_delete_2');
			$file_del_flg_3 = $this->request->getData('image_delete_3');


			// 更新エンティティ
			$target_entity = $this->Items->get($this->request->getData('Items.id'), [
				'contain' => ['Categorys', 'Brands']
			]);

			// 更新エンティティid
			$target_id = $target_entity["id"];

			// 更新エンティティimage_path
			$target_image_path_1 = $target_entity["image_path_1"];
			$target_image_path_2 = $target_entity["image_path_2"];
			$target_image_path_3 = $target_entity["image_path_3"];

			// 更新エンティティimage_path配列
			$targetImagePaths = [$target_image_path_1,$target_image_path_2,$target_image_path_3];
	
			// エラー配列
			$ers = [];

			// DBに保存するためのファイルパス配列
			$leave_file_paths = [];

			// 格納先
			$host = $_SERVER["HTTP_HOST"];
			if(strpos($host,'localhost')!== false){
				$dirPath = WWW_ROOT.'img/pages/items/'.$target_id;
			}else{
				$dirPath = '/home/xs293869/pen-world.net/public_html/img/pages/items/'.$target_id;
			}


			// パターン1:送信ファイルも削除フラグも無い
			if(
				empty(
					($file_name_1 && $file_name_2 && $file_name_3) && 
					($file_del_flg_1 && $file_del_flg_2 && $file_del_flg_3)
				)
			){
				// 既存の画像パス配列で上書き
				for($i = 1; $i < 4; $i++){
					$post_data["image_path_$i"] = $target_entity["image_path_$i"];
				}
			}

			// パターン2:削除フラグだけ
			if(
				empty($file_name_1 && $file_name_2 && $file_name_3) && 
				!empty($file_del_flg_1 || $file_del_flg_2 || $file_del_flg_3)
			){
				$leave_file_paths = []; // 削除しないファイルのパスをセット

				for($i = 1; $i < 4; $i++){

					if(${"file_del_flg_$i"} == "1"){ // 削除フラグのチェックが入っていた場合

						$delete_file_name = str_replace("pages/items/$target_id/", '', $target_entity["image_path_$i"]);

						$file = new File($dirPath.'/'.$delete_file_name);

						if(!$file->delete()){ // ファイル削除
							App::__flash_error('削除できないファイルがありました');
							return $this->redirect(['action' => 'index']);
						}

					}else{
	
						$leave_file_paths[] = $target_entity["image_path_$i"];
	
					}
				}

				// フォールドの値の繰り上げの準備
				for($i = 1; $i < 4; $i++){
					$post_data["image_path_$i"] = null; // 一旦全てnullにする
				}
				// フォールドの値の繰り上げ
				foreach($leave_file_paths as $key => $value){
					$post_data['image_path_'.($key + 1)] = $value;
				}
			}

			// パターン3:ファイルだけ
			if(
				!empty($file_name_1 || $file_name_2 || $file_name_3) && 
				empty($file_del_flg_1 && $file_del_flg_2 && $file_del_flg_3)
			){

				// ファイル格納
				for($i = 1; $i < 4; $i++){

					$fileData        = ${'file_'.$i};
					$fileName        = ${'file_name_'.$i};         // 送信ファイル名
					$targetImagePath = ${'target_image_path_'.$i}; // 既存のファイルパス

					if(!empty($fileName)){

						// 既存画像の重複確認
						for($c = 1; $c < 4; $c++){
							if($fileName == str_replace("pages/items/$target_id/", '', ${'target_image_path_'.$c})){
								$er["targetDuplication"] = "更新前に同名のファイルが存在しました(ファイル名を変更するか、削除してからアップしてください)";
								$ers[] = $er;
								continue;
							}
						}

						if(!empty($er["targetDuplication"])){
							$leave_file_paths[] = $targetImagePath;
							continue;
						}

						// エラーチェック
						$errResult = $this->checkFile($fileName, $countFileNames);
						if($errResult !== true){
							$ers[] = $errResult;
							if($targetImagePath !== null){
								$leave_file_paths[] = $targetImagePath;
							}
							continue;
						}

						// ファイル格納
						$fileData->moveTo($dirPath.'/'.$fileName);

						// パス配列に追加
						$leave_file_paths[] = 'pages/items/'.$target_id.'/'.$fileName;

						// 既存画像削除
						if($targetImagePath !== null){
							$delete_file_name = str_replace("pages/items/$target_id/", '', $targetImagePath);

							$file = new File($dirPath.'/'.$delete_file_name);

							if(!$file->delete()){
								App::__flash_error('削除できないファイルがありました');
								return $this->redirect(['action' => 'index']);
							}
						}

					}else{

						if($targetImagePath !== null){
							$leave_file_paths[] = $targetImagePath;
						}

					}

				}

				// フォールドの値の繰り上げの準備
				for($i = 1; $i < 4; $i++){
					$post_data["image_path_$i"] = null; // 一旦全てnullにする
				}

				// フォールドの値の繰り上げ
				foreach($leave_file_paths as $key => $value){
					$post_data['image_path_'.($key + 1)] = $value;
				}
			}


			// アップデート処理
			$update_entity = $this->Items->patchEntity($target_entity,$post_data);

			if($this->Items->save($update_entity)){

				App::__flash_success('更新されました');

				if(!empty($ers)){
					$erMsgs = [];
					foreach($ers as $key => $er){
						$count = (string)$key + 1;
						$erMsgs[] = $count.'枚目'.':'.join(' / ', $er);
					}
					$erAllMsgs = join('<br>', $erMsgs);
					App::__flash_error("【画像アップロードエラー】以下理由で画像が登録できませんでした<br>$erAllMsgs");
				}

			}else{

				App::__flash_error("更新できませんでした");

			}

			return $this->redirect(['action' => 'index']);
		}


		// pageSettings
		$H1_main = '商品編集';
		$metaData = [
			'title' => '【管理】商品登録一覧',
			'description' => '',
			'keywords' => '',
		];
		$breadCrumb = [
			['name' => '管理画面ホーム', 'controller' => 'home', 'action' => 'index'],
			['name' => '商品一覧', 'controller' => 'Items', 'action' => 'index'],
			['name' => '商品編集', 'controller' => '', 'action' => ''],
		];

		$empty_entity = $this->Items->newEmptyEntity();

		// カテゴリオプション
		$categorysRows = $this->Categorys->find('all')->toArray();
		$categorysOptions = $this->createItemsOptions($categorysRows, 'id', 'name');
		// ブランドオプション
		$brandsRows = $this->Brands->find('all')->toArray();
		$brandsOptions = $this->createItemsOptions($brandsRows, 'id', 'name');


		$target_entity = $this->Items->get($this->request->getQuery('id'), [
			'contain' => ['Categorys', 'Brands']
		]);

		// setData
		$this->set(compact('H1_main','metaData','breadCrumb','empty_entity','target_entity','categorysOptions','brandsOptions'));
	}


	// 削除
	public function delete(){

		if($this->request->is(['post'])){
			$target_entity = $this->Items->get($this->request->getData('Items.id'));

			if($this->Items->delete($target_entity)){

				// ファイルディレクトリ削除
				$dirPath = WWW_ROOT.'img/pages/items/'.$target_entity->id;

				if(file_exists($dirPath)){
					$folder = new Folder($dirPath);
					$folder->delete();
				}

				App::__flash_success('商品を削除しました');
			}else{
				App::__flash_error('商品を削除できませんでした');
			}
		}

		return $this->redirect(['action' => 'index']);
	}
	
}

