<?php

namespace APP\Blog\controllers;

use APP\Blog\Core\controller;
use PHPMailer\PHPMailer\PHPMailer;
use APP\Blog\Models\userModel;

class HomeController extends Controller{

    public function __construct($page,$matchs){
        parent::__construct($page,$matchs);
    }

    public function home(){
        $this->data['title'] = 'home';
        $this->data['styles'] = array_merge($this->data['styles'],["home.css"]);
        $this->data['scripts'] = ['home.js'];

        $userModel = new userModel();

        echo $this->twig->load('home.html.twig')->render($this->data);
    }

    public function sendMail(){
        $mail = isset($_POST['mail']) ? $_POST['mail'] : null;
        $phone = isset($_POST['phone']) ? $_POST['phone'] : null;
        $name = isset($_POST['name']) ? $_POST['name'] : 'someone';
        $content = isset($_POST['content']) ? $_POST['content'] : null;

        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = MAIL_HOST;
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = MAIL_PORT;
        $phpmailer->Username = MAIL_USERNAME;
        $phpmailer->Password = MAIL_PASSWORD;

        $phpmailer->setFrom('info@mailtrap.io', 'Mailtrap');
        $phpmailer->addAddress('recipient1@mailtrap.io', 'Tim');
        $phpmailer->isHTML(true);
        if($mail) $phpmailer->addReplyTo($mail, $name);

        $this->data['content'] = $content;
        $this->data['name'] = $name;
        $this->data['phone'] = $phone;
        $this->data['mail'] = $mail;

        $phpmailer->Subject = 'Test Email via Mailtrap SMTP using PHPMailer';
        $phpmailer->Body = $this->twig->load('mailContent.html.twig')->render($this->data);

        $response = new \stdClass();
        if(!$phpmailer->send()) {
            $response->code = 500;
            $response->message= 'mail cannot been sent';
        }else{
            $response->code = 200;
            $response->message= 'mail has been sent';
        }
        echo json_encode($response);
    }
}