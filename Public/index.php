<?php
require_once __DIR__.'/../Config/config.php';
require_once __DIR__.'/../autoload.php';
require_once __DIR__.'/../Config/root.php';

use APP\Blog\controllers\BlogHomeController;
use APP\Blog\controllers\ErrorController;
use APP\Blog\controllers\HomeController;
use APP\Blog\controllers\loginController;


$request_uri = explode('/',$_SERVER['REQUEST_URI'],3);
if(count($request_uri) > 2){
    $request_uri = explode('/',$_SERVER['REQUEST_URI'],3)[2];
    $uri =  explode('/',$request_uri);

    if(isset($roots[$request_uri])){
        $controller = $roots[$request_uri]['controller'];
        $page = $roots[$request_uri]['function'];
    }else{
        new ErrorController('error_404');
    }

    if(isset($controller)){
         switch ($controller){
             case 'login':
                 new loginController($page);
                 break;
             case 'home':
                 new homeController($page);
                 break;
             case 'blog':
                 new blogHomeController($page);
                 break;
             default:
                 new ErrorController('error_404');
                 break;
         }
     }
}else{
    header('Location: http://'.$_SERVER['HTTP_HOST'].'/index.php/home');
    exit();
}
