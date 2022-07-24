<?php

namespace App\Controller\Admin;

use App\Controller\AppController as App;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
// use Cake\ORM\TableRegistry;

class ArticlesController extends App
{

	// public function initialize(): void {
	// 	parent::initialize();
	// 	$articles = TableRegistry::getTableLocator()->get('Articles');
	// }

	// 独自関数 ////////////////////////////////////////////////

	/** savePostArticlesImageメソッド
	* - save済みのArticleのimage_pathフィールドと格納先の更新
	* - $file_data = postされたfileオブジェクト
	* - $id        = レコードID
	*/
	public function savePostArticlesImage($file_data, $id, $currentImagePath = null) {
		$file_name = $file_data->getClientFilename(); // ファイル名
		$dirPath   = WWW_ROOT.'img/pages/articles/'.$id; // 格納先ディレクトリ

		//ファイル名に日本語が入ってるかチェック
		$pattern = "/[ぁ-ん]+|[ァ-ヴー]+|[一-龠]/u"; // 日本語を省くための正規表現
		if(preg_match($pattern, $file_name)){
			$er["jp"] = "日本語のファイル名はアップロードできません";
		}

		//拡張子を調べる
		$ext = substr($file_name,-3); // アップされた画像の拡張子を抜き出す
		if($ext!="jpg" && $ext!="gif" && $ext!="png"){ 
			$er["ext"] = "拡張子はjpgとgifとpng以外はアップロードできません";
		}


		//編集用
		if(file_exists($dirPath) && !empty($er)){
			// 更新前の画像パスに戻す
			$save_entity = $this->Articles->get($id);
			$save_entity['image_path'] = $currentImagePath;
			$this->Articles->save($save_entity);

			return $er;
		}

		//エラー判定
		if(!empty($er)){
			return $er;
		}else{
			// Helper用パスを保存
			$save_entity = $this->Articles->get($id);
			$save_entity['image_path'] = 'pages/articles/'.$id.'/'.$file_name;
			$this->Articles->save($save_entity);
			
			// 格納先を変更
			if(!file_exists($dirPath)){
				$folder = new Folder();
				$folder->create($dirPath);
			}else{
				$file = new File($dirPath);
				$file->delete();
			}
			$file_data->moveTo($dirPath.'/'.$file_name);
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

			$post_data = $this->request->getData('Articles');
			$post_data["image_path"] = null; // save後、更新
			$insert_entity = $this->Articles->newEntity($post_data);
			
			if($save_entity = $this->Articles->save($insert_entity)){

				App::__flash_success('お知らせが追加されました');

				// fileがある場合
				if(!empty($this->request->getData('Articles.image_path')->getClientFilename())){
					$file_save_flg = $this->savePostArticlesImage($this->request->getData('Articles.image_path'), $save_entity->id);
					if($file_save_flg !== true){
						$ers = $file_save_flg; // file_save_flgの中身は$er配列
						$all_er_msg = implode("/", $ers);
						App::__flash_error("【画像アップロードエラー】<br>画像が登録できませんでした<br>原因:$all_er_msg");
					}
				}
				
			}else{
				App::__flash_error('お知らせが追加できませんでした');
			}
			return $this->redirect(['action' => 'index']);
		}
		
		return $this->redirect(['action' => 'index']);
	}


	// 編集
	public function update(){

		if($this->request->is(['post'])){

			$post_data        = $this->request->getData('Articles');
			$file_name        = $this->request->getData('Articles.image_path')->getClientFilename();
			$target_entity    = $this->Articles->get($post_data["id"]);
			$currentImagePath = $target_entity->image_path;

			if($file_name){
				$image_path = null;
			}else{
				$image_path = $target_entity->image_path;
			}
			$post_data["image_path"] = $image_path;

			// save
			$update_entity = $this->Articles->patchEntity($target_entity,$post_data);
			if($this->Articles->save($update_entity)){

				App::__flash_success('お知らせを編集しました');

				// fileがある場合
				if($this->request->getData('Articles.image_path')->getClientFilename()){ 
					// 新しい画像へのフィールド名と格納先更新
					$file_save_flg = $this->savePostArticlesImage($this->request->getData('Articles.image_path'), $target_entity->id, $currentImagePath);
					if($file_save_flg !== true){
						// エラーメッセージ作成
						$ers = $file_save_flg; // file_save_flgの中身は$er配列
						$all_er_msg = implode("/", $ers);
						App::__flash_error("【画像アップロードエラー】<br>画像が更新できませんでした<br>原因:$all_er_msg");
					}
				}

			}else{
				App::__flash_error('お知らせを編集できませんでした');
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

