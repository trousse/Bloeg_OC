<?php
   if($_GET('action') === "subscribe"){
       require('./Controllers/login.php');
       \THS\Blog\controllers\loginControler::subscribe();
   }