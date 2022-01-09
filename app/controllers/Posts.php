<?php

class Posts extends Controller
{
    public function __construct() {
        $this->postModel = $this->model('Post');
    }

    public function index() {
        $post = $this->postModel->findAllPosts();
        $data = [
            'title' => 'Blog page',
            'subtitle' => '',
            'bg_image' => 'home-bg.jpg',
            'posts' => $post
        ];
        $this->view('posts/index', $data);
    }

    public function p($id) {
        $post = $this->postModel->postBody($id[0]);

        $data = [
            'title' => 'Blog page',
            'subtitle' => '',
            'bg_image' => 'post-bg.jpg',
            'posts' => $post
        ];
//        print_r($data['posts']->body);
//        die();
        $this->view('posts/post', $data);
    }
}