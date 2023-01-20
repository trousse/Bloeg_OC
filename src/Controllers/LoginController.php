<?php

namespace APP\Blog\controllers;

    use APP\Blog\Core\controller;
    use APP\Blog\Models\userModel;

    class LoginController extends Controller{

        public function __construct($page,$matchs){
            parent::__construct($page,$matchs);
        }

        public function subscribe(){
            $pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : null;
            $pass = isset($_POST['pass']) ? $_POST['pass'] : null;
            $validPass = isset($_POST['validPass']) ? $_POST['validPass'] : null;
            $email = isset($_POST['email']) ? $_POST['email'] : null;
            $this->data['pseudo'] = $pseudo;
            $this->data['pass'] = $pass;
            $this->data['email'] = $email;

            if($pseudo && $pass && $email && $validPass){
                if($validPass === $pass){
                    try{
                        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $this->data['error'] = "email not valid";
                        else{
                            $pass = password_hash($pass,PASSWORD_DEFAULT);
                            $userModel = new userModel();
                            if(!$userModel->getUserPseudo($pseudo) && !$userModel->getUserMail($email)){
                                $userModel->subUser($pseudo,$email,$pass);
                            }else{
                                $this->data['error'] = $userModel->getUserPseudo($pseudo)? "pseudo already registered" : "email already in use";
                            }
                            if(!isset($this->data['error'])) header("Location: ".URI."/login");
                        }
                    }catch(\Exception $exception){
                        var_dump($exception);
                        $this->data['error'] = "error occur when subscribe";
                    }
                }else{
                    $this->data['error'] = "passwords were not corresponding ";
                }
            }else{
               if($pseudo || $pass || $email || $validPass) $this->data['error'] = "subform must be fully completed";
            }
            if(isset($this->data['error'])) var_dump($this->data['error']);
            $this->data['title'] = 'subscribe';
            $this->data['styles'] = array_merge($this->data['styles'],["subscribe.css"]);

            echo $this->twig->load('subscribe.html.twig')->render($this->data);
        }

        public function login(){
            $this->data['styles'] = array_merge($this->data['styles'],["subscribe.css"]);
            $this->data['title'] = 'login';

            $email = isset($_POST['email']) ? $_POST['email'] : null;
            $pass = isset($_POST['pass']) ? $_POST['pass'] : null;

            if($email && $pass){
                $userModel = new userModel();
                $user = $userModel->getUserMail($email);
                if($user){
                    $isValidPassword = password_verify($pass,$user->getPass());
                    if($isValidPassword){
                        $_SESSION['user'] = $user;
                        header("Location: ".URI."/home");
                    }else{
                        $this->data['error'] = "invalid password";
                    }
                }else{
                    $this->data['error'] = "email not exist";
                }
            }else{
               if($email || $pass) $this->data['error'] =  "subform must be fully completed";
            }

            echo $this->twig->load('login.html.twig')->render($this->data);
        }

        public function logout(){
            if(!empty($_SESSION['user'])){
                $_SESSION['user'] = null;
            }
            header("Location: ".URI."/home");
        }
    }

