<?php

namespace APP\Blog\Models;

use APP\Blog\Core\Model;
use APP\Blog\DTO\user;
use PDO;

class userModel extends model{

    public function getUser($userId){
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT * FROM User WHERE id = ?");
        $req->execute([$userId]);
        $result = $req->fetch(PDO::FETCH_ASSOC);

        return $result ? $this->hydrate(new user(),$result) : false;
    }

    public function editUserStatus($userId, $status){
        $db = $this->dbConnect();
        $req = $db->prepare("UPDATE `User` SET status = :status WHERE id =".$userId);

        $req->bindValue(':status', $status);

        return $req->execute();
    }

    public function getAllUser(){
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT * FROM User");
        $req->execute();
        $result = $req->fetchAll();
        return $result ? $this->hydrateAll(user::class, $result) : false;
    }

    public function getUserPseudo($pseudo){
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT * FROM User WHERE pseudo = ?");
        $req->execute([$pseudo]);
        $result = $req->fetch(PDO::FETCH_ASSOC);

        return $result ? $this->hydrate(new user(),$result) : false;
    }

    public function getUserMail($mail){
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT * FROM User WHERE email = ?");
        $req->execute([$mail]);
        $result = $req->fetch(PDO::FETCH_ASSOC);

        return $result ? $this->hydrate(new user(),$result) : false;
    }

    public function subUser($pseudo, $mail, $pass){
        $db = $this->dbConnect();
        $req = $db->prepare("INSERT INTO User (pseudo,email,pass,status,sub_date) VALUES (?, ?, ?, ?, ?)");
        $req->execute([$pseudo,$mail,$pass,'visitor',date("Y-m-d")]);
    }
}