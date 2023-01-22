<?php

namespace APP\Blog\Models;

use APP\Blog\Core\Model;
use APP\Blog\DTO\post;
use PDO;

class postModel extends model
{
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare("Select P.*,count((SELECT C.id WHERE C.Valided = true)) as nbComment FROM Post as P Left JOIN Comment as C on P.id = C.postId group by P.id having id = ?");
        $req->execute([$postId]);
        $result = $req->fetch(PDO::FETCH_ASSOC);

        return $result ? $this->hydrate(new post(), $result) : false;
    }

    public function getAllPost(){
        $db = $this->dbConnect();
        $req = $db->prepare("Select P.*,count((SELECT C.id WHERE C.Valided = true)) as nbComment  FROM Post as P
        Left JOIN Comment as C on P.id = C.postId
        group by P.id");
        $req->execute();
        $result = $req->fetchAll();
        return $result ? $this->hydrateAll(post::class, $result) : false;
    }

    public function createPost($user, $title, $header, $content, $current_date, $image = IMAGE_DEFAULT ){
        $db = $this->dbConnect();
        $req = $db->prepare("INSERT INTO `Post` (`title`,`header`,`userId`,`content`,`create_date`,`last_edit_date`,`image`) VALUES (:title, :header, :user, :content, :current_date, :current_date, :image)");

        $req->bindValue(':title', $title);
        $req->bindValue(':header', $header);
        $req->bindValue(':user', $user);
        $req->bindValue(':content', $content);
        $req->bindValue(':current_date', $current_date);
        $req->bindValue(':image', $image);

        return $req->execute();
    }

    public function editPost($postId, $title, $header, $content, $current_date, $image = IMAGE_DEFAULT ){
        $db = $this->dbConnect();
        $req = $db->prepare("UPDATE `Post` SET title = :title, header = :header, content = :content, last_edit_date = :current_date, image = :image WHERE id =".$postId);

        $req->bindValue(':title', $title);
        $req->bindValue(':header', $header);
        $req->bindValue(':content', $content);
        $req->bindValue(':current_date', $current_date);
        $req->bindValue(':image', $image);

        return $req->execute();
    }

    public function addClick($postId, $nbLike){
        $db = $this->dbConnect();
        $req = $db->prepare("UPDATE `Post` SET nbLike = :nbLike WHERE id =".$postId);

        $req->bindValue(':nbLike', $nbLike);

        return $req->execute();
    }

    public function deletePost($postId){
        $db = $this->dbConnect();
        $req = $db->prepare("DELETE FROM `Post` WHERE id = ".$postId);
        return $req->execute();
    }
}
