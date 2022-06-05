<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class BrandsController extends AppController
{
	
	public function index(){
		
		// pageSettings
		$H1_main = 'ブランド一覧';
		$metaData = [
			'title' => '【管理】ブランド一覧',
			'description' => '',
			'keywords' => '',
		];
		$breadCrumb = [
			['name' => '管理画面ホーム', 'controller' => 'home', 'action' => 'index'],
			['name' => 'ブランド一覧', 'controller' => '', 'action' => ''],
		];

		$empty_entity = $this->Brands->newEmptyEntity();

		// 全ブランドデータ
		$brandsRows = $this->Brands->find('all')->toArray();
		
		// setData
		$this->set(compact('H1_main','metaData','breadCrumb','brandsRows','empty_entity'));
	}


	// ブランド登録
	public function insert(){

		if($this->request->is('post')){
			$post_data = $this->request->getData('Brands');
			$insert_entity = $this->Brands->newEntity($post_data);

			if($this->Brands->save($insert_entity)){
				$this->Flash->success('ブランドが追加されました',[
					'key' => 'positive',
					'params' => [
						'class' => 'panel_positive',
					]
				]);
			}else{
				$this->Flash->error('ブランドが追加できませんでした',[
					'key' => 'error',
					'params' => [
						'class' => 'panel_negative',
					]
				]);
			}
		}
		return $this->redirect(['action' => 'index']);
	}


	// 編集
	public function update(){

		if($this->request->is(['post'])){
			$post_data = $this->request->getData('Brands');
			$target_entity = $this->Brands->get($this->request->getData('Brands.id'));
			$update_entity = $this->Brands->patchEntity($target_entity,$post_data);

			if($this->Brands->save($update_entity)){
				$this->Flash->success('ブランド名を編集しました',[
					'key' => 'positive',
					'params' => [
						'class' => 'panel_positive',
					]
				]);
			}else{
				$this->Flash->error('ブランド名を編集できませんでした',[
					'key' => 'error',
					'params' => [
						'class' => 'panel_negative',
					]
				]);
			}
		}
		return $this->redirect(['action' => 'index']);
		
	}


	// 削除
	public function delete(){

		if(!empty($this->request->getQuery('id'))){
			
			$target_entity = $this->Brands->get($this->request->getQuery('id'));

			if($this->Brands->delete($target_entity)){
				$this->Flash->success('ブランドを削除しました',[
					'key' => 'positive',
					'params' => [
						'class' => 'panel_positive',
					]
				]);
			}else{
				$this->Flash->error('ブランドを削除できませんでした',[
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

