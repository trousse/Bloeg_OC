<?php

namespace APP\Blog\controllers;

use APP\Blog\Core\controller;

class ErrorController extends Controller{

    public function __construct($page,$matchs){
        parent::__construct($page,$matchs);
    }

    public function error_404(){
        $this->data['title'] = 'not found';
        $this->data['styles'] = array_merge($this->data['styles'],["404.css"]);
        $this->data['error'] = '404';
        $this->data['message'] = "le chemin d'acces est incorrect";

        echo $this->twig->load('error.html.twig')->render($this->data);
    }

    public function error_403(){
        $this->data['title'] = 'not found';
        $this->data['styles'] = array_merge($this->data['styles'],["404.css"]);
        $this->data['error'] = '403';
        $this->data['message'] = "vous n'avez pas les accès à cette page";

        echo $this->twig->load('error.html.twig')->render($this->data);
    }
}