<?php

class Pages extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function index() {
        $post = $this->userModel->getPosts();
        $data = [
            'title' => 'Akhmadov Blog',
            'subtitle' => 'A Blog Theme by Start Bootstrap',
            'bg_image' => 'home-bg.jpg',
            'posts' => $post
        ];
        $this->view('pages/index', $data);
    }

    public function about() {
        $data = [
            'title' => 'About Me',
            'subtitle' => 'This is what I do.',
            'bg_image' => 'about-bg.jpg'
        ];
        $this->view('pages/about', $data);
    }
}