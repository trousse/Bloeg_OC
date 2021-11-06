<?php

namespace APP\Blog\controllers;

use APP\Blog\Core\controller;

class HomeController extends Controller{

    public function __construct($page){
        parent::__construct($page);
    }

    public function home(){
        $this->data['title'] = 'home';
        $this->data['styles'] = ["/css/home.css"];
        $this->data['scripts'] = ['/js/home.js'];

        echo $this->twig->load('home.html.twig')->render($this->data);
    }
}