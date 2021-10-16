<?php

namespace APP\Blog\controllers;

    use APP\Blog\Core\controller;

    class LoginControler extends Controller{

        public function __construct($page){
            parent::__construct();
            switch ($page){
                case 'subscribe':
                    $this->subscribe();
            }
        }

        public function subscribe(){
            $data['title'] = 'subscribe';
            $data['links'] = ["/css/subscribe.css"];

            echo $this->twig->load('test.html')->render($data);
        }
    }