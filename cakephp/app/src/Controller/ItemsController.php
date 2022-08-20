<?php

namespace App\Controller;

use App\Controller\AppController as App;
use Cake\ORM\TableRegistry;


class ItemsController extends AppController
{
	public function initialize(): void{

		parent::initialize();
		$this->Categorys = TableRegistry::getTableLocator()->get('Categorys');
		$this->Brands = TableRegistry::getTableLocator()->get('Brands');

	}

	// 独自関数 ////////////////////////////////////////////////

	/// createItemsOptionsメソッド

	// フォーム用オプションデータ
	function createItemsOptions($rows, $keyField, $valueField){
		$array = [];
		foreach ($rows as $Row){
			$array[$Row[$keyField]] = $Row[$valueField];
		}
		return $array;
	}

	//////////////////////////////////////////////////////
	
	public function index(){

			// findは複数行かえってくるのでtoArrayで配列への変換が必要(getな場合は1行しか返さないので不要)
			$itemsRow = $this->Items->find('all', ['contain' => ['Categorys', 'Brands']])->order(['position' => 'DESC']);

			// 検索条件の情報をViewへ渡す準備(テーブル名 => GETパラメータのキー)
			$repuestSearchData = [
				'Categorys' => 'category_id',
				'Brands' => 'brand_id',
			];

			foreach($repuestSearchData as $tables => $repuestParamKey){

				${'request'.$tables.'Id'} = 0;
				${'request'.$tables.'Name'} = '指定なし';

				if(!empty($this->request->getQuery($repuestParamKey))){ // パラメータが存在した場合に上書き

					$requestSearchRow = $this->$tables->get($this->request->getQuery($repuestParamKey));
					${'request'.$tables.'Id'} = $requestSearchRow->id;
					${'request'.$tables.'Name'} = $requestSearchRow->name;

					// 検索条件で絞る
					$itemsRow = $itemsRow->where(["$tables.id" => $requestSearchRow->id]);

				}

			}

			$itemsRow = $itemsRow->toArray();


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
			['name' => '取扱商品一覧', 'controller' => '', 'action' => ''],
		];

		// カテゴリオプション
		$categorysRows = $this->Categorys->find('all')->toArray();
		$categorysOptions = $this->createItemsOptions($categorysRows, 'id', 'name');
		// ブランドオプション
		$brandsRows = $this->Brands->find('all')->toArray();
		$brandsOptions = $this->createItemsOptions($brandsRows, 'id', 'name');

		// 検索用エンティティ
		$search_empty_entity = $this->Items->newEmptyEntity();

		
		// setData
		$this->set(compact('H1_main','H1_sub','metaData','breadCrumb','itemsRow','search_empty_entity','categorysOptions','brandsOptions','requestCategorysId','requestCategorysName','requestBrandsId','requestBrandsName'));
	}


	public function detail(){

		if(!$this->request->getQuery('id')){
			return $this->redirect(['action' => 'index']);
		}

		// itemData
		$item = $this->Items->get($this->request->getQuery('id'), [
			'contain' => ['Categorys', 'Brands']
		]);

		$itemName = $item->name;
		$itemCategoryName = $item->category->name;
		
		// pageSettings
		$metaData = [
			'title' => '取扱万円筆',
			'description' => 'ペンワールドは万年筆の販売と修理を行っております。',
			'keywords' => 'ペンワールドの片山,万年筆,展示会,ビンテージ',
		];
		$breadCrumb = [
			['name' => 'HOME', 'controller' => 'home', 'action' => 'index'],
			['name' => "$itemCategoryName", 'controller' => '', 'action' => ''],
			['name' => "$itemName", 'controller' => '', 'action' => ''],
		];

		// vueスライダー画像
		$fileMaxCount = 3;

		for($i = 0; $i < $fileMaxCount; $i++){
			$n = $i + 1;
			$image_path_property = 'image_path_'.$n;

			if($item->$image_path_property !== null){
				$image_paths[] = $item->$image_path_property;
			}
		}
		$json_image_paths = json_encode($image_paths);

		// 戻るボタンのリンク
		if(!empty($_SERVER['HTTP_REFERER'])){
			$backLink = $_SERVER['HTTP_REFERER'];
		}else{
			$backLink = ['controller' => 'item', 'action' => 'index'];
		}
		
		// setData
		$this->set(compact('metaData','breadCrumb','item','json_image_paths','backLink'));
	}
}
