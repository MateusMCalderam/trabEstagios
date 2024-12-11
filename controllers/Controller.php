<?php

namespace Controller;

abstract class Controller {

    // public function __construct($obrigaLogin = true){
    //     if (session_status() === PHP_SESSION_NONE) {
    //         session_start();
    //     }

    //     if($obrigaLogin) {
    //         if(!isset($_SESSION["usuario"])) {
    //             $this->redirect("/trabEstagios/login");
    //             exit;
    //         }
    //     }        
    // }

    public function redirect($url) {
        header("Location: " . $url);
    }

    public function loadView($view, $data = []) {
        extract($data);
        include("views/" . $view . ".php");
    }

    public function uploadFile($file, $oldFile = "")
    {
        if (!empty($oldFile)) {
            echo $oldFile;
            $this->deleteFile($oldFile);
        }

        if (empty($file)) {
            return '';
        }

        $extension = pathinfo($file["name"], PATHINFO_EXTENSION);
        $nomeArquivos = uniqid() . "." . $extension;
        move_uploaded_file($file["tmp_name"], "uploads/" . $nomeArquivos);

        return $nomeArquivos;
    }

    public function deleteFile($file_name) {
        $path = "uploads/" . $file_name;
        unlink($path);
    }

}