<?php

namespace App\Controller;

use App\Controller\AppController;


class ArticlesController extends AppController
{
	
	public function index(){
		
		// pageSettings
		$H1_main = 'news';
		$H1_sub = '展示会情報 / お知らせ';
		$metaData = [
			'title' => 'ペンワールドの片山のnewsページ',
			'description' => 'ペンワールドは万年筆の販売と修理を行っております。',
			'keywords' => 'ペンワールドの片山,万年筆,展示会,ビンテージ',
		];
		$breadCrumb = [
			['name' => 'HOME', 'controller' => 'home', 'action' => 'index'],
			['name' => 'NEWS (展示会情報 / お知らせ)', 'controller' => '', 'action' => ''],
		];

		// 全お知らせデータ
		$articlesRows = $this->Articles->find('all')->order(['date' => 'DESC'])->toArray();
		
		// setData
		$this->set(compact('H1_main','H1_sub','metaData','breadCrumb','articlesRows'));
	}
}