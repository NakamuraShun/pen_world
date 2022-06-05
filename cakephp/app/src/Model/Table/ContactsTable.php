<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class ContactsTable extends Table
{
	public function initialize(array $config): void
	{
		parent::initialize($config);

		$this->setTable('contacts');
		$this->setDisplayField('content');
		$this->setPrimaryKey('id');

		$this->addBehavior('Timestamp');
	}

	public function validationDefault(Validator $validator): Validator
	{
		$field = 'id';
		$validator
		->allowEmptyString($field)
		;
		
		$field = 'name';
		$validator
		->scalar($field, '文字を入力してください(数字を入力する場合は全角にしてください)')
		->requirePresence($field, 'create')
		->notEmptyString($field, '必須項目です')
		->maxLength($field, 100, '100文字以内で入力してください')
		;
		
		$field = 'mail';
		$validator
		->email($field, 'メールアドレスを入力してください')
		->requirePresence($field, 'create')
		->notEmptyString($field, '必須項目です')
		->maxLength($field, 100, '100文字以内で入力してください')
		;

		$field = 'phone';
		$validator
		->scalar($field, '電話番号を入力してください')
		->requirePresence($field, 'create')
		->notEmptyString($field, '必須項目です')
		->maxLength($field, 30, '30桁以内で入力してください')
		;

		$field = 'content';
		$validator
		->scalar($field, 'お問合わせ内容を入力してください')
		->requirePresence($field, 'create')
		->notEmptyString($field, '必須項目です')
		->maxLength($field, 1000, '1000文字以内で入力してください')
		;
		return $validator;
	}
}
