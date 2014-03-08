<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class PostsController extends AppController {
	public $helpers = array('Html');

	public function index() {
		$posts = TableRegistry::get('Posts');
		$this->set('posts', $posts->find('all'));
	}

	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid post'));
		}

		$posts = TableRegistry::get('Posts');
		$post = $posts->get($id);
		if (!$id) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->set('post', $post);
	}
}
