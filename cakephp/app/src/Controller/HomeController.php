<?php

namespace App\Controller;

use App\Controller\AppController as App;
use Cake\ORM\TableRegistry;


class HomeController extends App
{

	public function initialize(): void{

		parent::initialize();
		$this->Articles = TableRegistry::getTableLocator()->get('Articles');
		$this->Items = TableRegistry::getTableLocator()->get('Items');
		$this->Categorys = TableRegistry::getTableLocator()->get('Categorys');
		$this->Brands = TableRegistry::getTableLocator()->get('Brands');

	}
	
	public function index(){

		// 日付順で３つのお知らせ
		$articlesRows = $this->Articles
		->find('all')
		->order(['date' => 'DESC'])
		->limit(3)
		->toArray()
		;

		// 優先度順で３つの商品
		$itemsRows = $this->Items
		->find('all', ['contain' => ['Categorys', 'Brands']])
		->order(['position' => 'DESC'])
		->limit(3)
		->toArray()
		;

		// pageSettings
		$H1 = 'ペンワールドの片山';
		$metaData = [
			'title' => 'ペンワールドの片山',
			'description' => 'ペンワールドは万年筆の販売と修理を行っております。',
			'keywords' => 'ペンワールドの片山,万年筆,展示会,ビンテージ',
		];
		
		// setData
		$this->set(compact('H1','metaData','itemsRows','articlesRows'));
	}
}