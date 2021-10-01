<?php
    echo $_GET['action'];
   if($_GET['action'] === "subscribe"){
       require('./Controllers/login.php');
       \THS\Blog\controllers\loginControler::subscribe();
   }