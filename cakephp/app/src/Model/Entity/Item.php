<?php
namespace App\Model\Entity;
use Cake\ORM\Entity;

class Item extends Entity
{
	protected $_accessible = [
		'position' => true,
		'name' => true,
		'caption' => true,
		'description' => true,
		'supplement' => true,
		'price' => true,
		'image_path_1' => true,
		'image_path_2' => true,
		'image_path_3' => true,
		'category_id' => true,
		'brand_id' => true,
		'created' => true,
	];
}