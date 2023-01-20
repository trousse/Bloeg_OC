<?php

namespace APP\Blog\controllers;

use APP\Blog\Core\controller;
use APP\Blog\Models\commentModel;
use APP\Blog\Models\postModel;
use APP\Blog\Twig\avatarExtension;
use YoHang88\LetterAvatar\LetterAvatar;

class BlogController extends Controller{

    public function __construct($page,$matchs){
        parent::__construct($page,$matchs);
    }

    public function home(){
        $this->data['title'] = 'home';
        $this->data['styles'] = array_merge($this->data['styles'],["blogHome.css"]);

        $postModel = new postModel();
        $this->data["allPost"] = $postModel->getAllPost();
        $this->data["MostPopularPost"] = array_reduce($this->data["allPost"],function ($carry,$item){
            if(isset($carry)){
              return $carry->getNbLike() > $item->getNbLike() ? $carry : $item;
            }else{
                return $item;
            }
        });
        echo $this->twig->load('blogHome.html.twig')->render($this->data);
    }

    public function detail($postId){
        $this->data['title'] = 'detail';
        $this->data['styles'] = array_merge($this->data['styles'],["blogDetail.css"]);
        $postModel = new postModel();
        $commentModel = new commentModel();

        $this->data['post'] = $postModel->getPost($postId);
        $this->data['comments'] = $commentModel->getComments($postId);

        foreach ($this->data['comments'] as $comment){
            $comment->setAvatar((string)new LetterAvatar('T'));
        }

        echo $this->twig->load('detail.html.twig')->render($this->data);
    }

    public function addClick(){
        if(isset($_POST['postId'])) $postId = $_POST['postId'];
        $postModel = new postModel();
        $post = $postModel->getPost($postId);
        $post->addLike();

        $postModel->addClick($postId,$post->getNbLike());
        header('Location: /blog/detail/'. $postId.'#comments');
    }

    public function addComment(){
        if(isset($_POST['comment_content'])) $comment = $_POST['comment_content'];
        if(isset($_POST['postId'])) $postId = $_POST['postId'];
        $userId = $this->data['user']->getId();
        $date =  date('Y-n-j');

        if(!empty($comment)){
            $commentModel = new commentModel();
            $commentModel->createComment($userId, $postId, $comment, $date);

        }

        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
}