<?php

namespace APP\Blog\controllers;


use APP\Blog\Core\controller;
use APP\Blog\Models\commentModel;
use APP\Blog\Models\postModel;
use APP\Blog\Models\userModel;

class AdminController extends Controller
{

    public function __construct($page, $matchs)
    {
        parent::__construct($page, $matchs);
    }

    public function user()
    {
        $this->data['title'] = 'admin user';
        $this->data['styles'] = array_merge($this->data['styles'], ["admin.css"]);

        $userModel = new userModel();
        $this->data["allUser"] = $userModel->getAllUser();

        echo $this->twig->load('admin_user.html.twig')->render($this->data);
    }

    public function switchUserStatus($userId){
        try{
            $userModel = new userModel();
            $user = $userModel->getUser($userId);
            $status = $user->getStatus() == "admin" ? "visitor" : "admin";
            $userModel->editUserStatus($userId, $status);
        }catch(\Exception $e){
            var_dump($e);
            die;
        }
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }

    public function post()
    {
        $this->data['title'] = 'admin post';
        $this->data['styles'] = array_merge($this->data['styles'], ["admin.css"]);

        $postModel = new postModel();
        $this->data["allPost"] = $postModel->getAllPost();

        echo $this->twig->load('admin_post.html.twig')->render($this->data);
    }

    public function comment()
    {
        $this->data['title'] = 'admin comment';
        $this->data['styles'] = array_merge($this->data['styles'], ["admin.css"]);

        $commentModel = new commentModel();
        $this->data["allComment"] = $commentModel->getAllComments();

        echo $this->twig->load('admin_comment.html.twig')->render($this->data);
    }

    public function switchCommentValided($commentId){
        try{
            $commentModel = new commentModel();
            $comment = $commentModel->getComment($commentId);
            $valided = $comment->getvalided() == 1 ? 0 : 1;
            $commentModel->editcommentValided($commentId, $valided);
        }catch(\Exception $e){
            var_dump($e);
            die;
        }
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
}
