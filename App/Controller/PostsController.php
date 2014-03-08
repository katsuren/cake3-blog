<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Post;
use Cake\ORM\TableRegistry;

class PostsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');

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

	public function add() {
		if ($this->request->is('post')) {
			$posts = TableRegistry::get('Posts');
			$post = new Post($this->request->data('Post'));
			if ($posts->save($post)) {
				$this->Session->setFlash(__('Your post has been updated.'));
				return $this->redirect(array('action' => 'index'));
			}
			$message = __('Unable to update your post.');
			$errors = $post->errors();
			if ($errors) {
				foreach ($errors as $key => $list) {
					$message .= "<br>	[{$key}]";
					foreach ($list as $error) {
						$message .= "<br>		- {$error}";
					}
				}
			}
			$this->Session->setFlash($message);
		}
	}
}
