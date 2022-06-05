<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class ItemsTable extends Table
{
	public function initialize(array $config): void
	{
		parent::initialize($config);

		$this->setTable('items');
		$this->setDisplayField('name');
		$this->setPrimaryKey('id');
		$this->addBehavior('Timestamp');

		// アソシエーション(テーブル,外部キー)
		$this->belongsTo('Categorys',[
			'foreignKey' => 'category_id'
		]);
		$this->belongsTo('Brands',[
			'foreignKey' => 'brand_id'
		]);
	}

	public function validationDefault(Validator $validator): Validator
	{
		$field = 'id';
		$validator
		->allowEmptyString($field)
		;
		
		$field = 'position';
		$validator
		->requirePresence($field, 'create')
		->nonNegativeInteger($field, '0以上の数字を入力してください')
		->allowEmpty($field)
		;
		
		$field = 'name';
		$validator
		->scalar($field, '商品名を入力してください')
		->requirePresence($field, 'create')
		->notEmptyString($field, '必須項目です')
		->maxLength($field, 200, '200桁以内で入力してください')
		;

		$field = 'caption';
		$validator
		->scalar($field, 'キャプションを入力してください')
		->requirePresence($field, 'create')
		->allowEmpty($field)
		->maxLength($field, 200, '200桁以内で入力してください')
		;

		$field = 'description';
		$validator
		->scalar($field, '商品説明を入力してください')
		->requirePresence($field, 'create')
		->notEmptyString($field, '必須項目です')
		->maxLength($field, 800, '800文字以内で入力してください')
		;

		$field = 'supplement';
		$validator
		->scalar($field, '備考を入力してください')
		->requirePresence($field, 'create')
		->allowEmpty($field)
		->maxLength($field, 800, '800桁以内で入力してください')
		;

		$field = 'price';
		$validator
		->requirePresence($field, 'create')
		->nonNegativeInteger($field, '0以上の数字を入力してください')
		->allowEmpty($field)
		;

		$field = 'image_path_1';
		$validator
		->requirePresence($field, 'create')
		// ->notEmptyFile($field)
		->allowEmptyFile($field)
		;

		$field = 'image_path_2';
		$validator
		->requirePresence($field, 'create')
		->allowEmptyFile($field)
		;

		$field = 'image_path_3';
		$validator
		->requirePresence($field, 'create')
		->allowEmptyFile($field)
		;

		$field = 'category_id';
		$validator
		->requirePresence($field, 'create')
		->nonNegativeInteger($field)
		->notEmpty($field)
		;

		$field = 'brand_id';
		$validator
		->requirePresence($field, 'create')
		->nonNegativeInteger($field)
		->allowEmpty($field)
		;
		
		return $validator;
	}
}