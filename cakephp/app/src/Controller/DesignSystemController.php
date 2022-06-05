<?php

namespace App\Controller;

use App\Controller\AppController;


class DesignSystemController extends AppController
{
	
	public function index(){
		
		// pageSettings
		$H1 = 'DesignSystem';
		$metaData = [
			'title' => 'DesignSystem',
			'description' => '',
			'keywords' => '',
		];
		$breadCrumb = [
			['name' => 'HOME', 'controller' => 'home', 'action' => 'index'],
			['name' => 'DesignSystem', 'controller' => '', 'action' => ''],
		];
		
		// setData
		$this->set(compact('H1','metaData','breadCrumb'));
	}
}