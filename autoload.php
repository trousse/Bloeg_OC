<?php
require realpath(__DIR__ . '/vendor/autoload.php');

spl_autoload_register(function ($class){
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    $class = str_replace(MAIN_NAMESPACE.DIRECTORY_SEPARATOR,'',$class);
    echo $class;
    if(file_exists($class.'.php')){
        include_once $class.'.php';
    };
});