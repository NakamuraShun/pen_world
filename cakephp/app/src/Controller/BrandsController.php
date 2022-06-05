<?php

namespace App\Controller;

use App\Controller\AppController;
// use Cake\ORM\TableRegistry;

class  BrandsController extends AppController
{

	// public function initialize(): void{

	// 	parent::initialize();
	// 	$this->Brands = TableRegistry::get('brands');

	// }
	
	public function index(){
		
		// pageSettings
		$H1_main = 'ブランド一覧';
		$metaData = [
			'title' => '【管理】ブランド/メーカー一覧',
		];
		$breadCrumb = [
			['name' => 'HOME', 'controller' => 'home', 'action' => 'index'],
			['name' => 'ブランド/メーカー一覧', 'controller' => '', 'action' => ''],
		];

		$empty_entity = $this->Brands->newEmptyEntity();

		// 全ブランド/メーカーデータ
		$brandsRows = $this->Brands->find('all')->toArray();
		
		// setData
		$this->set(compact('H1_main','metaData','breadCrumb','brandsRows','empty_entity'));
	}

	// カテゴリ登録
	public function insert(){

		if($this->request->is('post')){
			$post_data = $this->request->getData('Brands');
			$insert_entity = $this->Brands->newEntity($post_data);

			if($this->Brands->save($insert_entity)){
				$this->Flash->success('ブランド/メーカーが追加されました',[
					'key' => 'positive',
			    	'params' => [
						'class' => 'panel_positive',
					]
				]);
			}else{
				$this->Flash->error('ブランド/メーカーが追加できませんでした',[
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
			
			// postデータ
			$post_data = $this->request->getData('Brands');

			// アップデート処理
			$target_entity = $this->Brands->get($this->request->getData('Brands.id'));
			$update_entity = $this->Brands->patchEntity($target_entity,$post_data);

			if($this->Brands->save($update_entity)){
				$this->Flash->success('ブランド/メーカー名を編集しました',[
					'key' => 'positive',
			    	'params' => [
						'class' => 'panel_positive',
					]
				]);
			}else{
				$this->Flash->error('ブランド/メーカー名を編集できませんでした',[
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
				$this->Flash->success('ブランド/メーカーを削除しました',[
					'key' => 'positive',
			    	'params' => [
						'class' => 'panel_positive',
					]
				]);
			}else{
				$this->Flash->error('ブランド/メーカーを削除できませんでした',[
					'key' => 'error',
					'params' => [
						'class' => 'panel_negative',
					]
				]);
			}
			
			return $this->redirect(['action' => 'index']);
		}

	}

}