<?php
    namespace THS\Blog\controllers;

    use THS\Blog\Core\controller;

    class loginControler extends controller{

        public static function subscribe(){
            require("../Views/subscribe.php");
        }
    }