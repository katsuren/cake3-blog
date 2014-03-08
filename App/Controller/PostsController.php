<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class PostsController extends AppController {
	public function index() {
		$posts = TableRegistry::get('Posts');
		$this->set('posts', $posts->find('all'));
	}
}
