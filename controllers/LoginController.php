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
}