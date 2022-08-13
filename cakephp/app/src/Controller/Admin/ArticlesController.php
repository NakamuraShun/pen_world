<?php

namespace App\Controller\Admin;

use App\Controller\AppController as App;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
// use Cake\ORM\TableRegistry;

class ArticlesController extends App
{

	// 独自関数 ////////////////////////////////////////////////

	/** checkFileメソッド
	* - 問題ない場合はtrueを返す
	* - $fileName       = ファイル名
	*/

	public function checkFile($fileName) {
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

		if(!empty($er)){
			return $er;
		}else{
			return true;
		}
	}

	//////////////////////////////////////////////////////

	
	public function index(){
		
		// pageSettings
		$H1_main = 'お知らせ一覧';
		$metaData = [
			'title' => '【管理】お知らせ登録一覧',
			'description' => '',
			'keywords' => '',
		];
		$breadCrumb = [
			['name' => '管理画面ホーム', 'controller' => 'home', 'action' => 'index'],
			['name' => 'お知らせ一覧', 'controller' => '', 'action' => ''],
		];

		$empty_entity = $this->Articles->newEmptyEntity();

		// 全お知らせデータ
		$articlesRows = $this->Articles->find('all')->order(['date' => 'DESC'])->toArray();
		
		// setData
		$this->set(compact('H1_main','metaData','breadCrumb','articlesRows','empty_entity'));
	}


	// 登録
	public function insert(){

		if($this->request->is('post')){

			// 送信データ
			$post_data = $this->request->getData('Articles');

			// 送信ファイル
			$fileData = $this->request->getData('Articles.image_path');

			// 送信ファイル名
			$fileName = $fileData->getClientFilename();

			// nullで初期化
			$post_data["image_path"] = null;

			// 保存
			$insert_entity = $this->Articles->newEntity($post_data);
			if($save_entity = $this->Articles->save($insert_entity)){
				App::__flash_success('追加されました');
			}else{
				App::__flash_error('追加できませんでした');
				return $this->redirect(['action' => 'index']);
			}


			// 格納先
			$host = $_SERVER["HTTP_HOST"];
			if(strpos($host,'localhost')!== false){
				$dirPath = WWW_ROOT.'img/pages/articles/'.$save_entity->id;
			}else{
				$dirPath = '/home/xs293869/pen-world.net/public_html/img/pages/articles/'.$save_entity->id;
			}

			// ディレクトリ作成
			if(!file_exists($dirPath)){
				$folder = new Folder();
				$folder->create($dirPath);
			}

			// fileがある場合
			if(!empty($fileName)){

				$errResult = $this->checkFile($fileName); // ファイル名のエラー無いか

				if($errResult !== true){
					
					$er = $errResult;
					$erMsg = join(' / ', $er);
					App::__flash_error("【画像アップロードエラー】以下理由で画像が登録できませんでした<br>$erMsg");

				}else{

					// ファイル格納
					$fileData->moveTo($dirPath.'/'.$fileName);


					// 更新するエンティティ
					$target_entity = $this->Articles->get($save_entity->id);

					// パスを上書き
					$target_entity["image_path"] = 'pages/articles/'.$save_entity->id.'/'.$fileName;

					// 保存
					if(!$this->Articles->save($target_entity)){

						App::__flash_error("【画像アップロードエラー】以下理由で画像が登録できませんでした<br>サーバーエラー");

					}

				}

			}

		}
		
		return $this->redirect(['action' => 'index']);
	}


	// 編集
	public function update(){

		if($this->request->is(['post'])){

			// ****************** セッティング ******************

			// 送信データ
			$post_data = $this->request->getData('Articles');

			// 送信ファイル
			$fileData = $this->request->getData('Articles.image_path');

			// 送信ファイル名
			$fileName = $fileData->getClientFilename();

			// ファイル操作のフラグ
			$file_flg = $this->request->getData('article_file_flg');


			// 更新エンティティ
			$target_entity = $this->Articles->get($post_data["id"]);

			// 更新エンティティid
			$target_id = $target_entity["id"];

			// 更新エンティティimage_path
			$currentImagePath = $target_entity["image_path"];

			// 現在のファイルパスで初期化
			$post_data["image_path"] = $currentImagePath;

			// エラー
			$er = '';

			// 格納先
			$host = $_SERVER["HTTP_HOST"];
			if(strpos($host,'localhost')!== false){
				$dirPath = WWW_ROOT.'img/pages/articles/'.$target_id;
			}else{
				$dirPath = '/home/xs293869/pen-world.net/public_html/img/pages/articles/'.$target_id;
			}


			// ****************** 処理はここから ******************

			// deleteフラグがあった場合
			if(!empty($file_flg == 'delete')){

				$deleteFileName = str_replace("pages/articles/$target_id/", '', $currentImagePath);
				$file = new File($dirPath.'/'.$deleteFileName);
				$file->delete(); // 削除

				$post_data["image_path"] = null; // パス更新

			}


			// updateフラグがあった場合
			if(!empty($file_flg == 'update')){

				if(!empty($fileName)){ // 送信ファイルもあった場合

					$errResult = $this->checkFile($fileName); // ファイル名のエラー無いか

					if($errResult !== true){
						
						$er = $errResult;

					}else{

						// 既存画像削除
						if($currentImagePath !== null){
							$deleteFileName = str_replace("pages/articles/$target_id/", '', $currentImagePath);
							$file = new File($dirPath.'/'.$deleteFileName);
							$file->delete();
						}

						// ファイル格納
						$fileData->moveTo($dirPath.'/'.$fileName);

						// パスを上書き
						$post_data["image_path"] = 'pages/articles/'.$target_id.'/'.$fileName;

					}

				}

			}


			// アップデート
			$update_entity = $this->Articles->patchEntity($target_entity,$post_data);

			if($this->Articles->save($update_entity)){

				App::__flash_success('更新されました');

				if(!empty($er)){
					$erMsg = join(' / ', $er);
					App::__flash_error("【画像アップロードエラー】以下理由で画像が登録できませんでした<br>$erMsg");
				}

			}else{

				App::__flash_error("更新できませんでした");

			}

			return $this->redirect(['action' => 'index']);
		}


		// pageSettings
		$H1_main = 'お知らせ編集';
		$metaData = [
			'title' => '【管理】お知らせ登録一覧',
			'description' => '',
			'keywords' => '',
		];
		$breadCrumb = [
			['name' => '管理画面ホーム', 'controller' => 'home', 'action' => 'index'],
			['name' => 'お知らせ一覧', 'controller' => 'Articles', 'action' => 'index'],
			['name' => 'お知らせ編集', 'controller' => '', 'action' => ''],
		];

		$empty_entity = $this->Articles->newEmptyEntity();
		$target_entity = $this->Articles->get($this->request->getQuery('id'));
		// setData
		$this->set(compact('H1_main','metaData','breadCrumb','empty_entity','target_entity'));
	}


	// 削除
	public function delete(){

		if($this->request->is(['post'])){
			$target_entity = $this->Articles->get($this->request->getData('Articles.id'));

			if($this->Articles->delete($target_entity)){

				// ファイルディレクトリ削除
				$dirPath = WWW_ROOT.'img/pages/articles/'.$target_entity->id;

				if(file_exists($dirPath)){
					$folder = new Folder($dirPath);
					$folder->delete();
				}

				App::__flash_success('お知らせを削除しました');
			}else{
				App::__flash_error('お知らせを削除できませんでした');
			}

		}

		return $this->redirect(['action' => 'index']);
	}
	
}

