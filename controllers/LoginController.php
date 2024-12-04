<?php

namespace Controller;

use Model\UserModel;
use Model\VO\UserVO;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



final class LoginController extends Controller {

    public function __construct() {
        parent::__construct(false);
    }

    public function login() {
        $this->loadView("login");
    }

    public function fazerLogin(){
        $vo = new UserVO(0, $_POST['login'], $_POST['senha']);
        $model = new UserModel();
        $result = $model->doLogin($vo);
    
        if (empty($result)) {
            header("Location: ./login"); 
            exit();
        } else {
            header("Location: ./usuarios"); 
            exit();
        }
    }
    
    
    public function logout() {
        session_destroy();
        header("Location: ./"); 
    }

    public function sendEmail(){
        require 'vendor/phpmailer/phpmailer/src/Exception.php';
        require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
        require 'vendor/phpmailer/phpmailer/src/SMTP.php';

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com"; 
        $mail->SMTPAuth = true;
        $mail->Username = "sistema.estagio00@gmail.com";
        $mail->Password = "ehkpunvukuqrvgoq";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
        $mail->Port = 465; 

        $mail->setFrom("sistema.estagio55@gmail.com");
        $mail->addAddress("mateusmmcalderam@gmail.com");
        $mail->isHTML(true);
        $mail->Subject = "Teste";
        $mail->Body = "Email Teste";

        $mail->send();
    }
}