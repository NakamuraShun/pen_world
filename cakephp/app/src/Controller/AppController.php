<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
	/**
	 * Initialization hook method.
	 *
	 * Use this method to add common initialization code like loading components.
	 *
	 * e.g. `$this->loadComponent('FormProtection');`
	 *
	 * @return void
	 */
	public function initialize(): void
	{
		parent::initialize();

		$this->loadComponent('RequestHandler');
		$this->loadComponent('Flash');

		/*
		* Enable the following component for recommended CakePHP form protection settings.
		* see https://book.cakephp.org/4/en/controllers/components/form-protection.html
		*/
		//$this->loadComponent('FormProtection');
	}

	// 独自関数 ////////////////////////////////////////////////

	/** __debug_vardumpToTxtメソッド
	* - var_dumpを/log.txtファイルへ出力する
	* - $data = var_dumpしたいデータ
	* https://coinbaby8.com/different-between-object-and-array.html (配列とオブジェクトの違い)
	*/
	public function __debug_vardumpToTxt($data) {
		ob_start();
		var_dump($data);
		$str = ob_get_contents();//バッファの内容を取得
		ob_end_clean();
		
		// log.txtに出力
		$file_path = __DIR__ . "/log.txt";
		// file_put_contents($file_path,'');
		$fp = fopen($file_path, "a+");
		fputs($fp, $str);
		fclose($fp); 
	}

	/** __flash_**メソッド
	* - $message = メッセージ内容
	*/
	public function __flash_success($message) {
		$this->Flash->success($message,[
			'key' => 'positive',
			'params' => [
				'class' => 'panel_positive',
			]
		]);
	}

	public function __flash_error($message) {
		$this->Flash->error($message,[
			'key' => 'error',
			'params' => [
				'class' => 'panel_negative',
			]
		]);
	}

	//////////////////////////////////////////////////////
}
