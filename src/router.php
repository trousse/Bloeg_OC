<?php

require_once __DIR__.'/../Config/config.php';
require_once __DIR__.'/../Config/root.php';

use APP\Blog\controllers\ErrorController;

$request_uri = explode('/',$_SERVER['REQUEST_URI']);


if(count($request_uri) > 1){
    $request_uri = explode('/',$_SERVER['REQUEST_URI']);
    array_shift($request_uri);
    $uri = $request_uri;
    $request_uri = implode('/',$request_uri);

    $url = trim($request_uri, '/');
    foreach (array_keys($routes) as $path){
        $regex = "#^".preg_replace('#:([\w]+)#', '([^/]+)', $path)."$#i";
        if(preg_match($regex, $url, $matches)){
            $controller = $routes[$path]['controller'];
            $page = $routes[$path]['function'];
            array_shift($matches);
            $controller = "APP\\Blog\\controllers\\".$controller."Controller";
            $controller = new $controller($page,$matches);
        }
    };

    if(!isset($controller)){
        new ErrorController('error_404',[]);
    }
}else{
    header('Location: http://'.$_SERVER['HTTP_HOST'].'/home');
    exit();
}