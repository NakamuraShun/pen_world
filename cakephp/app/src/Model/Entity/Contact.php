<?php
namespace App\Model\Entity;
use Cake\ORM\Entity;

class Contact extends Entity
{
	protected $_accessible = [
		'name' => true,
		'mail' => true,
		'phone' => true,
		'content' => true,
		'created' => true,
	];
}