<?php

namespace APP\Blog\controllers;

use APP\Blog\Core\controller;

class BlogHomeController extends Controller{

    public function __construct($page){
        parent::__construct($page);
    }

    public function home(){
        $this->data['title'] = 'home';
        $this->data['styles'] = ["/css/blogHome.css"];

        echo $this->twig->load('blogHome.html.twig')->render($this->data);
    }
}