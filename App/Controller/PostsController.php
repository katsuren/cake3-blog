<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Post;
use Cake\ORM\TableRegistry;
use Cake\ORM\Entity;

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
		if (!$post) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->set('post', $post);
	}

	public function add() {
		if ($this->request->is('post')) {
			// $posts = TableRegistry::get('Posts');
			$post = $posts->newEntity($this->request->data);
			// $post = $posts->newEntities([['title' => 'title', 'body' => 'body']]);
			$post = new Post($this->request->data);
			$post->created = date('Y-m-d H:i:s');
			$post->modified = date('Y-m-d H:i:s');
			if ($posts->save($post)) {
				$this->Session->setFlash(__('Your post has been updated.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(print_r($post->errors(), true));
			$posts = TableRegistry::get('Posts');
			$posts->save($entity);
			$this->redirect('/posts/index');
		}
	}
}
