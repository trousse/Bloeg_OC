<?php

namespace APP\Blog\controllers;

    use APP\Blog\Core\controller;

    class LoginController extends Controller{

        public function __construct($page){
            parent::__construct($page);
            $this->data['style'] = ["/css/login.css"];
        }

        public function subscribe(){
            $this->data['title'] = 'subscribe';
            $this->data['styles'] = array_merge($this->data,["/css/subscribe.css"]);

            echo $this->twig->load('subscribe.html.twig')->render($this->data);
        }

        public function login(){
            $this->data['title'] = 'login';
            echo $this->twig->load('login.html.twig')->render($this->data);
        }
    }