<?php

namespace App\Controller;

use App\Controller\AppController;


class RepairController extends AppController
{
	
	public function index(){
		
		// pageSettings
		$H1_main = 'repair';
		$H1_sub = '修理調整';
		$metaData = [
			'title' => 'ペンワールドの片山のrepairページ',
			'description' => 'ペンワールドは万年筆の販売と修理を行っております。',
			'keywords' => 'ペンワールドの片山,万年筆,展示会,ビンテージ',
		];
		$breadCrumb = [
			['name' => 'HOME', 'controller' => 'home', 'action' => 'index'],
			['name' => 'REPAIR (修理調整)', 'controller' => '', 'action' => ''],
		];
		
		// setData
		$this->set(compact('H1_main','H1_sub','metaData','breadCrumb'));
	}
}