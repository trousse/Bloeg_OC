<?php
require_once __DIR__.'/../Config/config.php';
require_once __DIR__.'/../autoload.php';

use APP\Blog\controllers\loginControler;

if(isset($_SERVER['REQUEST_URI'])){
    $request_uri = explode('?', $_SERVER['REQUEST_URI'], 2)[0];
    $controler = explode('/',$request_uri)[2];
    $page = join('/',array_slice(explode('/',$request_uri),3));

    if(isset($controler)){
        switch ($controler){
            case 'login':
                $loginController = new loginControler($page);
                break;
        }
    }

    /* if(isset($_GET['action']) && $_GET['action'] === "subscribe"){
        require('../src/Controllers/loginControler.php');
        $loginController = new loginControler();
        $loginController->subscribe();
    }
   */
}
