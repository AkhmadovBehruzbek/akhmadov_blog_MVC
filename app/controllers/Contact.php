<?php

class Contact extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Blog page',
            'subtitle' => '',
            'bg_image' => 'contact-bg.jpg',
        ];
        $this->view('contact/index', $data);
    }
}