<?php

namespace App\Controller;

use App\Controller\AppController;


class ContactsController extends AppController
{
	
	public function index(){
		
		// pageSettings
		$H1_main = 'contact';
		$H1_sub = 'お問い合わせ';
		$metaData = [
			'title' => 'ペンワールドの片山のcontactページ',
			'description' => 'ペンワールドは万年筆の販売と修理を行っております。',
			'keywords' => 'ペンワールドの片山,万年筆,展示会,ビンテージ',
		];
		$breadCrumb = [
			['name' => 'HOME', 'controller' => 'home', 'action' => 'index'],
			['name' => 'ABOUT (PWKについて)', 'controller' => '', 'action' => ''],
		];

		$empty_entity = $this->Contacts->newEmptyEntity();
		
		// setData
		$this->set(compact('H1_main','H1_sub','metaData','breadCrumb','empty_entity'));
	}

	// お問い合わせ登録
	public function insert(){

		if($this->request->is('post')){
			// 検証
			$new_entity = $this->Contacts->newEmptyEntity();
			$patch_entity = $this->Contacts->patchEntity($new_entity, $this->request->getData('Contacts'));
			if($patch_entity->getErrors()) {
				$this->Flash->error('入力内容をご確認ください',[
					'key' => 'error',
					'params' => [
						'class' => 'panel_negative',
					]
				]);
			//ここにリファラー入れないといけないかも??
			$this->redirect($this->request->referer());

			 }else{
				// session
                $this->request->getSession()->write('session.contact_insert', $patch_entity);
                return $this->redirect(['action' => 'confirm']);
            }
		}
		return $this->redirect(['action' => 'index']);

	}


	// 確認画面
	public function confirm(){

		if (!$this->request->getSession()->check('session.contact_insert')) {
			$this->Flash->error('セッションデータを確認できませんでした。再度お試しください。',[
				'key' => 'error',
				'params' => [
					'class' => 'panel_negative',
				]
			]);
			return $this->redirect(['action' => 'add']);
		}

		// pageSettings
		$H1_main = 'confirm';
		$H1_sub = 'お問い合わせ内容確認';
		$metaData = [
			'title' => '内容確認:ペンワールドの片山のお問い合わせ内容確認ページ',
			'description' => '',
			'keywords' => '',
		];

		$empty_entity = $this->Contacts->newEmptyEntity();
		$contact_insert = $this->request->getSession()->read('session.contact_insert');

		// set Data
		$this->set(compact('H1_main','H1_sub','metaData','empty_entity', 'contact_insert'));

    }

	// 送信完了画面
    public function complete(){

		// session取得判定
        if($this->request->getSession()->check('session.contact_insert')){
			
			// save判定
			if($this->Contacts->save($this->request->getSession()->consume('session.contact_insert'))){
				$this->Flash->success('お問い合わせが追加されました',[
					'key' => 'positive',
					'params' => [
						'class' => 'panel_positive',
					]
				]);
				// pageSettings
				$H1_main = 'confirm';
				$H1_sub = 'お問い合わせ送信完了';
				$metaData = [
					'title' => '内容完了:ペンワールドの片山のお問い合わせは送信完了されました',
					'description' => '',
					'keywords' => '',
				];
				// set Data
				$this->set(compact('H1_main','H1_sub','metaData'));
			}else{
				$this->Flash->error('【DBエラー】大変申し訳ありません。保存できませんでした。再度お試しください。',[
					'key' => 'error',
					'params' => [
						'class' => 'panel_negative',
					]
				]);
				return $this->redirect(['action' => 'index']);
			}

        }else{

			$this->Flash->error('【セッションエラー】大変申し訳ありません。送信できませんでした。再度お試しください。',[
				'key' => 'error',
				'params' => [
					'class' => 'panel_negative',
				]
			]);
			return $this->redirect(['action' => 'index']);

		}

    }

	// 削除
	public function delete(){

		if(!empty($this->request->getQuery('id'))){
			
			$target_entity = $this->Articles->get($this->request->getQuery('id'));

			// 画像ファイル削除
			if($target_entity['image_path']){
				$target_entity_image_path = 'webroot/img/' . $target_entity['image_path'];
				unlink($target_entity_image_path);
			}

			if($this->Articles->delete($target_entity)){
				$this->Flash->success('お知らせを削除しました',[
					'key' => 'positive',
					'params' => [
						'class' => 'panel_positive',
					]
				]);
			}else{
				$this->Flash->error('お知らせを削除できませんでした',[
					'key' => 'error',
					'params' => [
						'class' => 'panel_negative',
					]
				]);
			}
		}
		return $this->redirect(['action' => 'index']);

	}


}
