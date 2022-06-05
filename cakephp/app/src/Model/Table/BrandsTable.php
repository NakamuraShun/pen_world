<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class BrandsTable extends Table
{
	public function initialize(array $config): void
	{
		parent::initialize($config);

		$this->setTable('brands');
		$this->setDisplayField('name');
		$this->setPrimaryKey('id');

		// アソシエーション
		$this->hasMany('Items',[
			'foreignKey' => 'brand_id',
			'dependent' => true, 
			// 'dependent' => true 再帰的にモデルを削除する
			// 特定のbrandが削除されると関連するitemsも削除される仕様
		]);
	}

	public function validationDefault(Validator $validator): Validator
	{
		$field = 'id';
		$validator
		->allowEmptyString($field)
		;
		
		$field = 'name';
		$validator
		->scalar($field, '登録するブランド/メーカー名を入力してください')
		->requirePresence($field, 'create')
		->notEmptyString($field, '必須項目です')
		->maxLength($field, 100, '100文字以内で入力してください')
		->add($field, 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => 'すでに登録済みのブランド/メーカーです']);  //効いてない(DBの設定で重複になはらないけど..)
		;
		
		return $validator;
	}
}