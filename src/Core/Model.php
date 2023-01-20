<?php

namespace APP\Blog\Core;

use Exception;
use PDO;

class model{
    protected function dbConnect(){
        try
        {
            $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASS);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
        return $db;
    }

    protected function hydrate($object,$dataArray){
        foreach ($dataArray as $attr => $value){
            $attr = ucfirst($attr);
            if(method_exists($object,'set'.$attr)){
                $name = 'set'.$attr;
                $object->$name($value);
            }
        }
        return $object;
    }

    protected function hydrateAll($class,$results){
        $result_array = [];
        foreach ($results as $result) {
            $object = new $class();
            $result_array[] = $this->hydrate($object,$result);
        }
        return $result_array;
    }
}