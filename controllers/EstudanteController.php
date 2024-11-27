<?php

namespace Controller;

use Model\EstudanteModel;
use Model\VO\EstudanteVO;

final class EstudanteController extends Controller {

    public function list(){
        $model = new EstudanteModel();
        $data = $model->selectAll(new EstudanteVO());

        $this->loadView("listEstudante", [
            "estudantes" => $data
        ]);
    }

    public function form(){
        $id = $_GET['id'] ?? 0;

        if(empty($id)){
            $vo = new EstudanteVO();
        } else {
            $model = new EstudanteModel();
            $vo = $model->selectOne(new EstudanteVO($id));
        }
        
        $this->loadView("formEstudante", [
            "estudante" => $vo
        ]);
    }
        
    public function save() {
        $id = $_POST['id'];
        $model = new EstudanteModel();

        $vo = new EstudanteVO(
            $id, 
            $_POST['nome'], 
            $_POST['matricula'], 
            $_POST['idCurso'], 
            $_POST['cpf'], 
            $_POST['rg'], 
            $_POST['idCidade'], 
            $_POST['telefone'], 
            $_POST['endereco'], 
            $_POST['email']
        );
                
        if(empty($id)){
            $result = $model->insert($vo);
        }else{
            $result = $model->update($vo);
        }

        $this->redirect("../estudantes");
    }
    
    public function remove() {
        $model = new EstudanteModel();
        $model->delete(new EstudanteVO($_GET['id']));
        $this->redirect("../estudantes");
    }
}