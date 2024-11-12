<?php

namespace Controller;

use Model\UserModel;
use Model\VO\UserVO;

final class LoginController extends Controller {

    public function __construct() {
        parent::__construct(false);
    }

    public function login() {
        $this->loadView("login");
    }

    public function fazerLogin(){
        $vo = new UserVO(0, $_POST['login'], $_POST['senha'], $_POST['nivel']);
        $model = new UserModel();
        $result = $model->doLogin($vo);


        if(empty($result)){
            $this->redirect("login.php");
        }else {
            $this->redirect("usuarios.php");
        }
    }

    public function logout() {
        session_destroy();
        $this->redirect("index.php");
    }
}