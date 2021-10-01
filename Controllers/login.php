<?php
    namespace THS\Blog\controllers;
    require_once("./Core/controller.php");
    use THS\Blog\Core\controller;

    class loginControler extends controller{

        public static function subscribe(){
            require("./Views/subscribe.php");
        }
    }