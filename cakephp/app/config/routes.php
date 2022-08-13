<?php

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

$routes->setRouteClass(DashedRoute::class);


////////// 管理画面 ////////////////////////////////////////
$routes->prefix('Admin', function (RouteBuilder $builder) {
	// カテゴリ
	$builder->connect('/categorys',		   ['controller' => 'Categorys', 'action' => 'index']);
	$builder->connect('/categorys/insert', ['controller' => 'Categorys', 'action' => 'insert']);
	$builder->connect('/categorys/update', ['controller' => 'Categorys', 'action' => 'update']);
	$builder->connect('/categorys/delete', ['controller' => 'Categorys', 'action' => 'delete']);
	// ブランド
	$builder->connect('/brands',		   ['controller' => 'Brands', 'action' => 'index']);
	$builder->connect('/brands/insert',    ['controller' => 'Brands', 'action' => 'insert']);
	$builder->connect('/brands/update',    ['controller' => 'Brands', 'action' => 'update']);
	$builder->connect('/brands/delete',    ['controller' => 'Brands', 'action' => 'delete']);
	// お問い合わせ
	$builder->connect('/contacts',		   ['controller' => 'Contacts', 'action' => 'index']);
	$builder->connect('/contacts/delete',  ['controller' => 'Contacts', 'action' => 'delete']);
	$builder->fallbacks(DashedRoute::class);
});


////////// フロント //////////////////////////////////////
$routes->scope('/', function (RouteBuilder $builder) {
	// designSystem
	$builder->connect('design_system', ['controller' => 'DesignSystem', 'action' => 'index']);
	// TOP
	$builder->connect('/', ['controller' => 'Home', 'action' => 'index']);
	// ABOUT
	$builder->connect('/about', ['controller' => 'About', 'action' => 'index']);
	// ITME
	$builder->connect('/items', ['controller' => 'Items', 'action' => 'index']);
	$builder->connect('/items/detail', ['controller' => 'Items', 'action' => 'detail']);
	// OWN BRAND
	$builder->connect('/own_brand', ['controller' => 'OwnBrand', 'action' => 'index']);
	// NEWS
	$builder->connect('/news', ['controller' => 'Articles', 'action' => 'index']);
	$builder->connect('/news/:id', ['controller' => 'Articles', 'action' => 'index'],['id' => '[0-9]+']);
	// STORE
	$builder->connect('/store', ['controller' => 'Store', 'action' => 'index']);
	// REPAIR
	$builder->connect('/repair', ['controller' => 'Repair', 'action' => 'index']);
	// CONTACT
	$builder->connect('/contact', ['controller' => 'Contacts', 'action' => 'index']);
	$builder->fallbacks(DashedRoute::class);
});
