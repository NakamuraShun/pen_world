<?php

namespace App\Controller;

use App\Controller\AppController;


class StoreController extends AppController
{
	
	public function index(){
		
		// pageSettings
		$H1_main = 'store';
		$H1_sub = '店舗情報';
		$metaData = [
			'title' => 'ペンワールドの片山のstoreページ',
			'description' => 'ペンワールドは万年筆の販売と修理を行っております。',
			'keywords' => 'ペンワールドの片山,万年筆,展示会,ビンテージ',
		];
		$breadCrumb = [
			['name' => 'HOME', 'controller' => 'home', 'action' => 'index'],
			['name' => 'STORE (店舗情報)', 'controller' => '', 'action' => ''],
		];
		
		// setData
		$this->set(compact('H1_main','H1_sub','metaData','breadCrumb'));
	}
}