<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class ArticlesTable extends Table
{
	public function initialize(array $config): void
	{
		parent::initialize($config);

		$this->setTable('articles');
		$this->setDisplayField('title');
		$this->setPrimaryKey('id');

		$this->addBehavior('Timestamp');
	}

	public function validationDefault(Validator $validator): Validator
	{
		$field = 'id';
		$validator
		->allowEmptyString($field)
		;
		
		$field = 'date';
		$validator
		->requirePresence($field, 'create')
		->notEmptyDate($field, '必須項目です')
		;
		
		$field = 'title';
		$validator
		->scalar($field, 'タイトルを入力してください')
		->requirePresence($field, 'create')
		->notEmptyString($field, '必須項目です')
		->maxLength($field, 100, '100桁以内で入力してください')
		;

		$field = 'description';
		$validator
		->scalar($field, 'お知らせ内容を入力してください')
		->requirePresence($field, 'create')
		->notEmptyString($field, '必須項目です')
		->maxLength($field, 500, '500文字以内で入力してください')
		;

		$field = 'image_path';
		$validator
		->requirePresence($field, 'create')
		->allowEmptyFile($field)
		// // アップロードエラー
		// ->add('upfile', 'uploadError', [
		// 	'rule' => ['uploadError'],
		// 	'message' => 'ファイルのアップロードができませんでした',
		// 	'last' => true,
		// ])
		// // ファイルサイズ
		// ->add('upfile', 'fileSize', [
		// 	'rule' => ['fileSize', '<', '102400'],
		// 	'message' => '100 キロバイト未満のファイルを選択してください',
		// ])
		// // 拡張子
		// ->add('upfile', 'extension', [
		// 	'rule' => ['extension', ['jpg', 'png']],
		// 	'message' => '拡張子が jpg か png のファイルを選択してください',
		// 	'last' => true,
		// ])
		// // MIME タイプ
		// ->add('upfile', 'mimeType', [
		// 	'rule' => ['mimeType', ['image/jpeg', 'image/png']],
		// 	'message' => 'JPEG か PNG 形式のファイルを選択してください',
		// ]);
		;
		return $validator;
	}
}