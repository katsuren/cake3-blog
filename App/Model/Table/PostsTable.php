<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class PostsTable extends Table {
	public function validationDefault(Validator $validator) {
		$validator
			->add('title', 'notEmpty', [
				'rule' => 'notEmpty',
				'message' => 'You need to provide a title',
			])
			->add('body', 'notEmpty', [
				'rule' => 'notEmpty',
				'message' => 'A body is required',
			]);
		return $validator;
	}

	public function beforeSave($event, $entity, $options) {
		// create を渡してないだけのときもあるので、
		// 処理の方法は別途考えた方がいい。
		// 多分今後フレームワーク自体が対応してくれるはず・・・
		if (empty($entity->created)) {
			$entity->created = date('Y-m-d H:i:s');
		}
		if (empty($entity->modified)) {
			$entity->modified = date('Y-m-d H:i:s');
		}
		return true;
	}
}
