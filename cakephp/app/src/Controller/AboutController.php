<?php

namespace App\Controller;

use App\Controller\AppController;


class AboutController extends AppController
{
	
	public function index(){
		
		// pageSettings
		$H1_main = 'about';
		$H1_sub = 'PWKについて';
		$metaData = [
			'title' => 'ペンワールドの片山のaboutページ',
			'description' => 'ペンワールドは万年筆の販売と修理を行っております。',
			'keywords' => 'ペンワールドの片山,万年筆,展示会,ビンテージ',
		];
		$breadCrumb = [
			['name' => 'HOME', 'controller' => 'home', 'action' => 'index'],
			['name' => 'ABOUT (PWKについて)', 'controller' => '', 'action' => ''],
		];
		
		// setData
		$this->set(compact('H1_main','H1_sub','metaData','breadCrumb'));
	}
}