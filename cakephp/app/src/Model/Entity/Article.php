<?php
namespace App\Model\Entity;
use Cake\ORM\Entity;

class Article extends Entity
{
	protected $_accessible = [
		'date' => true,
		'title' => true,
		'description' => true,
		'image_path' => true,
		'created' => true,
	];
}

