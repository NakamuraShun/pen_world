<?php

namespace App\Controller;

use App\Controller\AppController as App;
use Cake\ORM\TableRegistry;


class ItemsController extends AppController
{
	public function initialize(): void{

		parent::initialize();
		$this->Categorys = TableRegistry::getTableLocator()->get('categorys');
		$this->Brands = TableRegistry::getTableLocator()->get('brands');

	}
	
	public function index(){
		
		// pageSettings
		$H1_main = 'items';
		$H1_sub = '取扱万円筆';
		$metaData = [
			'title' => '取扱万円筆',
			'description' => 'ペンワールドは万年筆の販売と修理を行っております。',
			'keywords' => 'ペンワールドの片山,万年筆,展示会,ビンテージ',
		];
		$breadCrumb = [
			['name' => 'HOME', 'controller' => 'home', 'action' => 'index'],
			['name' => 'items (取扱万円筆)', 'controller' => '', 'action' => ''],
		];

		// findBy**は複数行かえってくるので配列、つまりtoArrayが必要
		// getは1行しか返さないので不要

		// itemData
		$itemsRow = $this->Items->find('all', ['contain' => ['Categorys', 'Brands']])
		->order(['position' => 'DESC'])
		->toArray();
		App::__debug_vardumpToTxt($itemsRow);

		
		// setData
		$this->set(compact('H1_main','H1_sub','metaData','breadCrumb','itemsRow'));
	}

	public function detail(){

		if($this->request->getQuery('id')){
			$id = $this->request->getQuery('id');
		}else{
			return $this->redirect(['action' => 'index']);
		}
		
		// pageSettings
		$metaData = [
			'title' => '取扱万円筆',
			'description' => 'ペンワールドは万年筆の販売と修理を行っております。',
			'keywords' => 'ペンワールドの片山,万年筆,展示会,ビンテージ',
		];
		$breadCrumb = [
			['name' => 'HOME', 'controller' => 'home', 'action' => 'index'],
			['name' => 'item (取扱万円筆)', 'controller' => 'items', 'action' => 'index'],
			['name' => '{ダンヒル・ナミキ　忍草}', 'controller' => '', 'action' => ''],
		];

		// itemData
		$item = $this->Items->get($id, [
			'contain' => ['Categorys', 'Brands']
		]);

		// vueスライダー画像
		for($i = 1; $i < 4; $i++){
			$image_path_property = 'image_path_'.$i;

			if($item->$image_path_property !== null){
				$image_paths[] = $item->$image_path_property;
			}
		}
		$json_image_paths = json_encode($image_paths);
		
		// setData
		$this->set(compact('metaData','breadCrumb','item','json_image_paths'));
	}
}
