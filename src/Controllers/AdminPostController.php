<?php

namespace APP\Blog\controllers;

use APP\Blog\Core\controller;
use APP\Blog\Models\postModel;
use mysql_xdevapi\Exception;

class adminPostController extends Controller{

    /**
     * @var string[]
     */
    private array $required = ["title","header","content"];

    public function __construct($page,$matchs){
        parent::__construct($page,$matchs);
        $this->data['styles'] = array_merge($this->data['styles'],["adminPost.css"]);
    }

    private function adminPost($buttonValue, $formFunction, $formUrl){

        //$this->data['title'] = 'create personal post interface';
        $this->data['styles'] = array_merge($this->data['styles'],["createPost.css","trumbowyg.min.css"]);
        $this->data['scripts'] = ['trumbowyg.min.js','createPost.js'];

        $this->data['buttonValue'] = $buttonValue;
        $this->data['formFunction'] = $formFunction;
        $this->data['formUrl'] = $formUrl;

        if(isset($_POST['image'])) $this->data['image'] = $_POST['image'];
        if(isset($_POST['title'])) $this->data['title'] = $_POST['title'];
        if(isset($_POST['header'])) $this->data['header'] = $_POST['header'];
        if(isset($_POST['post_content'])) $this->data['content'] = $_POST['post_content'];

        $dataSent = isset($this->data['title']) || isset($this->data['image']) || isset($this->data['header']) || isset($this->data['content']);

        if(!$dataSent){
            echo $this->twig->load('createPost.html.twig')->render($this->data);
            die;
        }

        $this->data['required'] = [];
        foreach ($this->required as $required){
            if(empty($this->data[$required])){
                $this->data['required'][$required] = true;
            }
        }

        if(!empty($this->data['required'])) {
            $this->data['message'] = "All required field need to be fill";
            echo $this->twig->load('createPost.html.twig')->render($this->data);
            die;
        }

        echo $this->twig->load('createPost.html.twig')->render($this->data);
    }

    public function createPost(){
        $post_model = new postModel();
        $this->adminPost("Create new article","create","create");

        try{
            $post_model->createPost($_SESSION['user']->getId(),  $this->data['title'],  $this->data['header'],  $this->data['content'], date('Y-n-j'), $this->data['image']);
        }catch(\Exception $e){
            var_dump($e);
        }
        var_dump("send data db");
    }

    public function editPost($postId){
        $post_model = new postModel();
        $post = $post_model->getPost($postId);

        if(!$post){
            die("not correct id");
        }

        $this->data['title'] = $post->getTitle();
        $this->data['header'] = $post->getHeader();
        $this->data['content'] = $post->getContent();
        $this->data['image'] = $post->getImage();

        $this->adminPost("Edit article","edit","edit/".$postId);

        try{
            $post_model->editPost($postId, $this->data['title'],  $this->data['header'],  $this->data['content'], date('Y-n-j'), $this->data['image']);
        }catch(\Exception $e){
            var_dump($e);
        }
    }

    public function deletePost($postId)
    {
        $post_model = new postModel();
        $post = $post_model->getPost($postId);

        if($post) {
            $user = $_SESSION['user'];
            $userOwnPost = $post->getUserId() === $user->getId();

            if ($_SESSION['user']->getStatus() === "admin" || $userOwnPost) {
                if ($postId) $post_model->deletePost($postId);
            }
        }

        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
}