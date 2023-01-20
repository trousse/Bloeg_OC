<?php

namespace APP\Blog\controllers;


use APP\Blog\Core\controller;
use APP\Blog\Models\postModel;

class APIController extends Controller{
    public function deletePost()
    {
        $postModel = new postModel();
        $user = $_SESSION['user'];
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $userOwnPost = $postModel->getPost($id)->getUserId() === $user->getId();

        if ($_SESSION['user']->getStatus() === "admin" || $userOwnPost){
            if ($id) {
                return $postModel->deletePost($id);
            }
        }
      return false;
    }
}