<?php

namespace APP\Blog\Models;

use APP\Blog\Core\Model;
use APP\Blog\DTO\comment;
use PDO;

class commentModel extends model
{

    public function getComment($commentId){
        $db = $this->dbConnect();
        $req = $db->prepare("Select C.id as id, C.content as content,C.date as date, C.valided as valided, P.title as postTitle, U.pseudo as pseudo FROM 
                                                                 Comment as C 
                                                                     LEFT JOIN Post as P on C.postId = P.id 
                                                                     LEFT JOIN User as U on C.userId  = U.id WHERE C.id = ? ");
        $req->execute([$commentId]);
        $result = $req->fetch(PDO::FETCH_ASSOC);

        return $result ? $this->hydrate(new comment(), $result) : false;
    }

    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare("Select C.content as content,C.date as date, C.valided as valided, P.title as postTitle, U.pseudo as pseudo FROM 
                                                                 Comment as C 
                                                                     LEFT JOIN Post as P on C.postId = P.id 
                                                                     LEFT JOIN User as U on C.userId  = U.id WHERE P.id = ? ");
        $req->execute([$postId]);
        $result = $req->fetchAll(PDO::FETCH_ASSOC);

        return $result ? $this->hydrateAll(comment::class, $result) : false;
    }

    public function getAllComments(){
        $db = $this->dbConnect();
        $req = $db->prepare("Select C.id as id, C.content as content,C.date as date, C.valided as valided, P.title as postTitle, U.pseudo as pseudo FROM 
                                                                 Comment as C 
                                                                     LEFT JOIN Post as P on C.postId = P.id 
                                                                     LEFT JOIN User as U on C.userId  = U.id");
        $req->execute();
        $result = $req->fetchAll();
        return $result ? $this->hydrateAll(comment::class, $result) : false;
    }

    public function createComment($userId, $postId, $content, $date, $valided = 0){
        $db = $this->dbConnect();
        $req = $db->prepare("INSERT INTO `Comment` (`userId`,`postId`,`content`,`valided`,`date`) VALUES (:userId, :postId, :content, :valided, :date)");

        $req->bindValue(':userId', $userId);
        $req->bindValue(':postId', $postId);
        $req->bindValue(':content', $content);
        $req->bindValue(':valided', $valided);
        $req->bindValue(':date', $date);

        return $req->execute();
    }

    public function editCommentValided($commentId, $valided){
        $db = $this->dbConnect();
        $req = $db->prepare("UPDATE `Comment` SET valided = :valided WHERE id =".$commentId);

        $req->bindValue(':valided', $valided);

        return $req->execute();
    }
}
