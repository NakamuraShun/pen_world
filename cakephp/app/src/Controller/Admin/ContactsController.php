<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class ContactsController extends AppController
{
	
	public function index(){
		
		// pageSettings
		$H1_main = 'お問い合わせ一覧';
		$metaData = [
			'title' => '【管理】お問い合わせ一覧',
			'description' => '',
			'keywords' => '',
		];
		$breadCrumb = [
			['name' => '管理画面ホーム', 'controller' => 'home', 'action' => 'index'],
			['name' => 'お問い合わせ一覧', 'controller' => '', 'action' => ''],
		];

		// 全お問い合わせデータ
		$contactsRows = $this->Contacts->find('all')->toArray();
		
		// setData
		$this->set(compact('H1_main','metaData','breadCrumb','contactsRows'));
	}


	// 削除
	public function delete(){

		if(!empty($this->request->getQuery('id'))){
			
			$target_entity = $this->Contacts->get($this->request->getQuery('id'));

			if($this->Contacts->delete($target_entity)){
				$this->Flash->success('お問い合わせを削除しました',[
					'key' => 'positive',
					'params' => [
						'class' => 'panel_positive',
					]
				]);
			}else{
				$this->Flash->error('お問い合わせを削除できませんでした',[
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

