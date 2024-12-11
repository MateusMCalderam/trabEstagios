<?php

namespace Controller;

use Model\EstagioModel;
use Model\VO\EstagioVO;

use Model\ProfessorModel;
use Model\VO\ProfessorVO;

final class EstagioController extends Controller {

    public function list() {
        $model = new EstagioModel();
        $data = $model->selectAll(new EstagioVO());

        $this->loadView("listEstagioUser", [
            "estagios" => $data
        ]);
    }
    
    public function listSecao() {
        $model = new EstagioModel();
        $data = $model->selectAll(new EstagioVO());

        $this->loadView("listEstagioSecao", [
            "estagios" => $data
        ]);
    }

    public function form() {
        $id = $_GET['id'] ?? 0;

        $modelProfessores = new ProfessorModel();
        $professores = $modelProfessores->selectAll(new ProfessorVO());

        if (empty($id)) {
            $vo = new EstagioVO();
        } else {
            $model = new EstagioModel();
            $vo = $model->selectOne(new EstagioVO($id));
        }
        
        $this->loadView("formEstagio", [
            "estagio" => $vo,
            "professores" => $professores
        ]);
    }
        
    public function save() {
        $id = $_POST['id'];
        $model = new EstagioModel();

        $vo = new EstagioVO(
            $id,
            $_POST['periodo'],
            $_POST['area'],
            $_POST['cargaHoraria'],
            $_POST['idEstudante'],
            $_POST['idOrientador'],
            $_POST['idEmpresa'],
            $_POST['representante'],
            $_POST['idCidade'],
            $_POST['idCoorientador'],
            $_POST['nomeSupervisor'],
            $_POST['cargoSupervisor'],
            $_POST['telefoneSupervisor'],
            $_POST['emailSupervisor'],
            $_POST['tipoProcesso'],
            $_POST['encaminhamentos'],
            $_POST['planoAtividades'],
            $_POST['relatorioFinal'],
            $_POST['autoavaliacaoEmpresa'],
            $_POST['autoavaliacao'],
            $_POST['termoCompromisso']
        );

        if (empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("../estagios");
    }
    
    public function remove() {
        $model = new EstagioModel();
        $model->delete(new EstagioVO($_GET['id']));
        $this->redirect("../estagios");
    }
}
