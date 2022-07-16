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
	* - ファイル名に日本語入っている、拡張子が異なる場合は$erを返す
	* - 問題ない場合はtrueを返す
	* - $file_name = ファイル名
	*/

	public function checkFile($file_name) {
		//ファイル名に日本語が入ってるかチェック
		$pattern = "/^[a-z0-9A-Z\-_]+\.[a-zA-Z]{3}$/"; // 日本語を省くための正規表現
		if(!preg_match($pattern, $file_name)){
			$er["jp"] = "・ファイル名に日本語は含まないでください";
		}

		//拡張子を調べる
		$ext = substr($file_name, -3); // アップされた画像の拡張子を抜き出す
		if($ext != "jpg" && $ext != "gif" && $ext != "png"){ 
			$er["ext"] = "・jpg,gif,pngの画像のみアップロードできます";
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

	public function savePostItemsImage($updateFiles, $id, $currentImagePaths) {

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
				// ディレクトリ確認とファイルの削除
				if(!file_exists($dirPath)){
					$folder = new Folder();
					$folder->create($dirPath);
				}else{
					if(!empty($currentImagePaths[$key])){
						$dir = new Folder($dirPath);
						$exist_file_name = str_replace("pages/items/$id/", '', $currentImagePaths[$key]);
						$files = $dir->find($exist_file_name);
						// App::__debug_vardumpToTxt($files);
						if(!empty($files)){
							$files[0]->delete();
						}
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

		App::__debug_vardumpToTxt($er);

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
		// App::__debug_vardumpToTxt();

		if($this->request->is('post')){

			$post_data = $this->request->getData('Items');

			// intへキャスト
			$castDatas = ['position','price','category_id','brand_id'];
			foreach($castDatas as $data) {
				$post_data[$data] = intval($post_data[$data]);
			}

			$post_data['image_path_1'] = null;
			$post_data['image_path_2'] = null;
			$post_data['image_path_3'] = null;


			$insert_entity = $this->Items->newEntity($post_data);

			if($save_entity = $this->Items->save($insert_entity)){

				// fileがある場合
				if(!empty(
					$this->request->getData('Items.image_path_1')->getClientFilename() || 
					$this->request->getData('Items.image_path_2')->getClientFilename() || 
					$this->request->getData('Items.image_path_3')->getClientFilename())
				){
					for($i = 1; $i < 4; $i++){
						$files[] = $this->request->getData('Items.image_path_'.$i);
					}

					 $currentImagePaths = 0;

					// ファイルパスとディレクトリを更新
					$file_save_flg = $this->savePostItemsImage($files, $save_entity->id, $currentImagePaths); 

					if($file_save_flg === true){
						App::__flash_success('画像も商品も追加されました');
					}else{
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
						App::__flash_error('商品は追加できましたが、画像が登録できませんでした' . "\n" . $all_er_msg);
					}
					return $this->redirect(['action' => 'index']);
				}

				// image_path_1が必須のため基本的にこちらはない
				App::__flash_success('商品が追加されました');
			}else{
				App::__flash_error('商品が追加できませんでした');
			}
			return $this->redirect(['action' => 'index']);
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

			// fileがある場合はnullへ更新
			if(!empty(
				$this->request->getData('Items.image_path_1')->getClientFilename() || 
				$this->request->getData('Items.image_path_2')->getClientFilename() || 
				$this->request->getData('Items.image_path_3')->getClientFilename())
			){
				$post_data['image_path_1'] = null;
				$post_data['image_path_2'] = null;
				$post_data['image_path_3'] = null;
			}else{
				for($i = 0; $i < 3; $i++){
					$post_data['image_path_'.($i + 1)] = $currentImagePaths[$i];
				}
			}
			// App::__debug_vardumpToTxt($post_data['image_path_1']);
			// App::__debug_vardumpToTxt($post_data['image_path_2']);
			// App::__debug_vardumpToTxt($post_data['image_path_3']);


			$update_entity = $this->Items->patchEntity($target_entity,$post_data);
	
			if($save_entity = $this->Items->save($update_entity)){

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
					$file_save_flg = $this->savePostItemsImage($updateFiles, $save_entity->id, $currentImagePaths); 

					if($file_save_flg === true){
						App::__flash_success('画像も商品も更新されました');
					}else{
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
						App::__flash_error('商品は更新できましたが、画像が更新できませんでした' . "\n" . $all_er_msg);
					}
					return $this->redirect(['action' => 'index']);
				}

				// image_path_1が必須のため基本的にこちらはない
				App::__flash_success('商品が更新されました');
			}else{
				App::__flash_error('商品が更新できませんでした');
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

