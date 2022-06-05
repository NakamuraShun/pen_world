<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class CategorysController extends AppController
{
	
	public function index(){
		
		// pageSettings
		$H1_main = '商品カテゴリ一覧';
		$metaData = [
			'title' => '【管理】商品カテゴリ一覧',
			'description' => '',
			'keywords' => '',
		];
		$breadCrumb = [
			['name' => '管理画面ホーム', 'controller' => 'home', 'action' => 'index'],
			['name' => '商品カテゴリ一覧', 'controller' => '', 'action' => ''],
		];

		$empty_entity = $this->Categorys->newEmptyEntity();

		// 全カテゴリデータ
		$categorysRows = $this->Categorys->find('all')->toArray();
		
		// setData
		$this->set(compact('H1_main','metaData','breadCrumb','categorysRows','empty_entity'));
	}


	// カテゴリ登録
	public function insert(){

		if($this->request->is('post')){
			$post_data = $this->request->getData('Categorys');
			$insert_entity = $this->Categorys->newEntity($post_data);

			if($this->Categorys->save($insert_entity)){
				$this->Flash->success('カテゴリが追加されました',[
					'key' => 'positive',
					'params' => [
						'class' => 'panel_positive',
					]
				]);
			}else{
				$this->Flash->error('カテゴリが追加できませんでした',[
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
			$post_data = $this->request->getData('Categorys');
			$target_entity = $this->Categorys->get($this->request->getData('Categorys.id'));
			$update_entity = $this->Categorys->patchEntity($target_entity,$post_data);

			if($this->Categorys->save($update_entity)){
				$this->Flash->success('カテゴリ名を編集しました',[
					'key' => 'positive',
					'params' => [
						'class' => 'panel_positive',
					]
				]);
			}else{
				$this->Flash->error('カテゴリ名を編集できませんでした',[
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
			
			$target_entity = $this->Categorys->get($this->request->getQuery('id'));

			if($this->Categorys->delete($target_entity)){
				$this->Flash->success('カテゴリを削除しました',[
					'key' => 'positive',
					'params' => [
						'class' => 'panel_positive',
					]
				]);
			}else{
				$this->Flash->error('カテゴリを削除できませんでした',[
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
