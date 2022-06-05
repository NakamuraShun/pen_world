<?php

namespace App\Controller;

use App\Controller\AppController;


class HomeController extends AppController
{
	
	public function index(){
		
		// pageSettings
		$H1 = 'ペンワールドの片山';
		$metaData = [
			'title' => 'ペンワールドの片山',
			'description' => 'ペンワールドは万年筆の販売と修理を行っております。',
			'keywords' => 'ペンワールドの片山,万年筆,展示会,ビンテージ',
		];
		$breadCrumb = [
			['name' => 'HOME', 'controller' => 'home', 'action' => 'index'],
			['name' => 'HOMEカレントページ', 'controller' => '', 'action' => ''],
		];
		
		// setData
		$this->set(compact('H1','metaData','breadCrumb'));
	}
}