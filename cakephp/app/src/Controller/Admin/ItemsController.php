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
	* - $file_name = ファイル名
	*/

	public function checkFile($file_name) {
		$er = [];

		//日本語が入ってるか
		if(preg_match("/[ぁ-ん]+|[ァ-ヴー]+|[一-龠]/u", $file_name)){
			$er["jp"] = "日本語のファイル名はアップロードできません";
		}

		//拡張子を調べる
		$ext = substr($file_name, -3); // アップされた画像の拡張子を抜き出す
		if($ext != "jpg" && $ext != "gif" && $ext != "png"){ 
			$er["ext"] = "拡張子はjpgとgifとpng以外はアップロードできません";
		}

		if(!empty($er)){
			return $er;
		}else{
			return true;
		}
	}


	/** savePostItemsImageメソッド
	* - save済みのItemのimage_pathフィールドと格納先の更新
	* - $files = fileオブジェクト配列
	* - $id    = レコードID
	*/

	public function savePostItemsImage($updateFiles, $id, $currentImagePaths = null) {

		// App::__debug_vardumpToTxt($currentImagePaths);
		// App::__debug_vardumpToTxt($updateFiles);

		$dirPath   = WWW_ROOT.'img/pages/items/'.$id; // 格納先ディレクトリ
		$save_entity = $this->Items->get($id);
		$er = [];
		$ers = []; // reruenするエラー配列

		foreach($updateFiles as $key => $file){

			//ファイル名存在
			if(empty($file->getClientFilename())){
				if($currentImagePaths !== 0){
					// 更新前の画像パスを代入
					$save_entity['image_path_'.($key + 1)] = $currentImagePaths[$key];
				}
				continue;
			}else{
				$file_name = $file->getClientFilename();
			}

			//ファイル名付検証
			$result = $this->checkFile($file_name);
			if($result !== true){
				$er = $result;
			}

			//ファイル重複確認
			if(file_exists($dirPath)){
				// ディレクトリー内のファイルを取得
				$scan_data = scandir($dirPath);
				// App::__debug_vardumpToTxt($scan_data);

				foreach($scan_data as $data){
					if(!is_dir($data)){ //ファイルのみ
						if($file_name == $data){
							$er["double"] = "・重複してるのでアップできません。";
							//  break;  // ersがあるので中断
						}
					}
				}
			}

			if(empty($er)){

				// ディレクトリ確認
				if(!file_exists($dirPath)){
					$folder = new Folder();
					$folder->create($dirPath);
				}

				// ファイルの削除
				if(!empty($currentImagePaths[$key])){
					$dir = new Folder($dirPath);
					$exist_file_name = str_replace("pages/items/$id/", '', $currentImagePaths[$key]);
					$files = $dir->find($exist_file_name);
					// App::__debug_vardumpToTxt($files);
					if(!empty($files)){
						$files[0]->delete();
					}
				}
				
				// image_path_**フィールド更新
				$save_entity['image_path_'.($key + 1)] = 'pages/items/'.$id.'/'.$file_name;

				// レコード更新
				$this->Items->save($save_entity);

				// ファイルを移動
				$file->moveTo($dirPath.'/'.$file_name);
			}else{
				$ers[] = $er; // reruenする$ers配列に格納
				if($currentImagePaths !== 0){
					$save_entity['image_path_'.($key + 1)] = $currentImagePaths[$key]; // 更新前の画像パスに戻す
				}				
			}
		}


		if(!empty($ers)){
			// App::__debug_vardumpToTxt($ers); // 意図した配列になっているか確認
			return $ers;
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

			// fileがある場合
			if(!empty(
				$this->request->getData('Items.image_path_1')->getClientFilename() || 
				$this->request->getData('Items.image_path_2')->getClientFilename() || 
				$this->request->getData('Items.image_path_3')->getClientFilename())
			){

				$ers = [];       // エラー配列
				$filePaths = []; // DBに保存するためのファイルパス配列

				$host = $_SERVER["HTTP_HOST"];
				if(strpos($host,'localhost')!== false){
					$dirPath = WWW_ROOT.'img/pages/items/'.$save_entity->id; // 格納先
				}else{
					$dirPath = '/home/xs293869/pen-world.net/public_html/img/pages/items/'.$save_entity->id;
				}

				// ファイル格納
				for($i = 1; $i < 4; $i++){
					if(!empty($this->request->getData('Items.image_path_'.$i)->getClientFilename())){

						$fileData = $this->request->getData('Items.image_path_'.$i);
						$fileName = $this->request->getData('Items.image_path_'.$i)->getClientFilename();

						// エラーチェック
						$errResult = $this->checkFile($fileName);
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

				// パス更新
				$target_entity = $this->Items->get($save_entity->id);

				foreach($filePaths as $key => $value){
					$target_entity['image_path_'.($key + 1)] = $value;
				}

				if($this->Items->save($target_entity)){

					if(!empty($ers)){
						$erMsgs = [];
						foreach($ers as $key => $er){
							$count = (string)$key + 1;
							$erMsgs[] = $count.'枚目'."\n".join("\n", $er);
						}
						$erAllMsgs = join("\n", $erMsgs);
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

			$post_data = $this->request->getData('Items');
			$target_entity = $this->Items->get($post_data["id"], [
				'contain' => ['Categorys', 'Brands']
			]);

			// intへキャスト
			$castDatas = ['position','price','category_id','brand_id'];
			foreach($castDatas as $data) {
				$post_data[$data] = intval($post_data[$data]);
			}
			// 既存の画像パス配列
			for($i = 1; $i < 4; $i++){
				$currentImagePaths[] = $target_entity["image_path_$i"];
			}

			// image_path_の調整
			if(!empty(
				$this->request->getData('Items.image_path_1')->getClientFilename() || 
				$this->request->getData('Items.image_path_2')->getClientFilename() || 
				$this->request->getData('Items.image_path_3')->getClientFilename())
			){
				// fileがある場合はnullへ
				$post_data['image_path_1'] = null;
				$post_data['image_path_2'] = null;
				$post_data['image_path_3'] = null;
			}else{
				// fileがない場合は既存パスへ
				for($i = 0; $i < 3; $i++){
					$post_data['image_path_'.($i + 1)] = $currentImagePaths[$i];
				}
			}

			$update_entity = $this->Items->patchEntity($target_entity,$post_data);

			if($this->Items->save($update_entity)){

				App::__flash_success('商品が更新されました');

				// fileがある場合
				if(!empty(
					$this->request->getData('Items.image_path_1')->getClientFilename() || 
					$this->request->getData('Items.image_path_2')->getClientFilename() || 
					$this->request->getData('Items.image_path_3')->getClientFilename())
				){
					for($i = 1; $i < 4; $i++){
						$updateFiles[] = $this->request->getData('Items.image_path_'.$i);
					}
					// ファイルパスとディレクトリを更新
					$file_save_flg = $this->savePostItemsImage($updateFiles, $target_entity["id"], $currentImagePaths); 

					if($file_save_flg !== true){
						// $ers[]
						// エラーメッセージ作成
						$er_msgs[] = '';
						$ers = $file_save_flg;
						foreach($ers as $key => $er){
							$er_msg = join("\n", $er);
							$count_str = (string)$key + 1;
							$er_msgs[] = $count_str.'枚目'."\n".$er_msg;
						}
						$all_er_msg = join("\n", $er_msgs);
						App::__flash_error("【画像アップロードエラー】<br>画像が登録できませんでした<br>原因:$all_er_msg");
					}
					return $this->redirect(['action' => 'index']);
				}

			}else{
				App::__flash_error('更新できませんでした');
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

