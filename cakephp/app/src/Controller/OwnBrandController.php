<?php

namespace App\Controller;

use App\Controller\AppController;


class OwnBrandController extends AppController
{
	
	public function index(){
		
		// pageSettings
		$H1_main = 'own brand';
		$H1_sub = '自社ブランド';
		$metaData = [
			'title' => '自社ブランド',
			'description' => 'ペンワールドは万年筆の販売と修理を行っております。',
			'keywords' => 'ペンワールドの片山,万年筆,展示会,ビンテージ',
		];
		$breadCrumb = [
			['name' => 'HOME', 'controller' => 'home', 'action' => 'index'],
			['name' => 'OWN BRAND (自社ブランド)', 'controller' => '', 'action' => ''],
		];
		
		// setData
		$this->set(compact('H1_main','H1_sub','metaData','breadCrumb'));
	}
}