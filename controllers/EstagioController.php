<?php

namespace Controller;

use Model\EstagioModel;
use Model\VO\EstagioVO;

use Model\ProfessorModel;
use Model\VO\ProfessorVO;

class EstagioController extends Controller {
    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

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
        $section = $_SESSION['sectionAtual'] ?? 'dados-gerais'; 

        $vo = isset($_SESSION['estagio_vo']) ? $_SESSION['estagio_vo'] :  new EstagioVO;
        
        if(!empty($id)){
            $model = new EstagioModel();
            $vo = $model->selectOne(new EstagioVO($id));
        } 
        $this->saveVoToSession($id, $vo);

        $this->loadView("formEstagio", []);
    }

    public function save() {
        $section = $_SESSION["sectionAtual"] ?? 'dados-gerais';
        $id = $_SESSION["estagio_vo"]->getId() ?? 0;
    
        $model = new EstagioModel();
        $this->saveSectionDataToSession($section);

    
        if ($section != "documentos") {
            $nextSection = $this->getNextSection($section);
            $_SESSION["sectionAtual"] = $nextSection;
            $this->loadView("formEstagio", []);
        } else {
            $vo = isset($_SESSION['estagio_vo']) ? $_SESSION['estagio_vo'] :  new EstagioVO ;
        
            if ($id != 0) {
                $vo->setId($id);
                $model->update($vo);
            } else {
                $model->insert($vo);
            }
    
            unset($_SESSION['estagio_vo']);
            unset($_SESSION['sectionAtual']);
            $this->redirect("../estagiosSecao");
        }
    }

    public function mudaSectionEstagio() {
        $nextSection = isset($_GET['section']) ? $_GET['section'] : "dados-gerais";
        $id = $_SESSION["estagio_vo"]->getId() ?? 0;

        $_SESSION["sectionAtual"] = $nextSection;
        $this->redirect("./estagios/form");
    }

    public function remove() {
        $model = new EstagioModel();
        $model->delete(new EstagioVO($_GET['id']));
        $this->redirect("../estagiosSecao");
    }
    
    

    private function saveSectionDataToSession($section) {
        
        $vo = isset($_SESSION['estagio_vo']) ? $_SESSION['estagio_vo'] :  new EstagioVO ;
        switch ($section) {
            case 'dados-gerais':
                $vo->setArea($_POST['area'] ?? "");
                $vo->setIdCidade($_POST['idCidade'] ?? 0);
                $vo->setStatus($_POST['status'] ?? "");
                $vo->setTipoProcesso($_POST['tipoProcesso'] ?? "");
                break;
        
            case 'periodo':
                $vo->setCargaHoraria($_POST['cargaHoraria'] ?? 0);
                $vo->setPeriodo($_POST['periodo'] ?? "");
                break;
        
            case 'atores':
                $vo->setIdEstudante($_POST['idEstudante'] ?? 0);
                $vo->setIdOrientador($_POST['idOrientador'] ?? 0);
                $vo->setIdEmpresa($_POST['idEmpresa'] ?? 0);
                $vo->setIdCoorientador(isset($_POST['idCoorientador']) && $_POST['idCoorientador'] !== '' ? $_POST['idCoorientador'] : null);
                break;
        
            case 'representante':
                $vo->setRepresentante($_POST['representante'] ?? "");
                $vo->setNomeSupervisor($_POST['nomeSupervisor'] ?? "");
                $vo->setCargoSupervisor($_POST['cargoSupervisor'] ?? "");
                $vo->setTelefoneSupervisor($_POST['telefoneSupervisor'] ?? "");
                $vo->setEmailSupervisor($_POST['emailSupervisor'] ?? "");
                break;
        
            case 'documentos':
                $vo->setPlanoAtividades($_FILES['planoAtividades']['name'] ?? null);
                $vo->setRelatorioFinal($_FILES['relatorioFinal']['name'] ?? null);
                $vo->setAutoavaliacaoEmpresa($_FILES['autoavaliacaoEmpresa']['name'] ?? null);
                $vo->setAutoavaliacao($_FILES['autoavaliacao']['name'] ?? null);
                $vo->setTermoCompromisso($_FILES['termoCompromisso']['name'] ?? null);
                break;
        }
    
        $this->saveVoToSession(0, $vo);
    }
    

    private function getNextSection($currentSection) {
        $sections = ['dados-gerais', 'periodo', 'atores', 'representante', 'documentos', 'finalizar'];
        $currentIndex = array_search($currentSection, $sections);
        return $sections[$currentIndex + 1] ?? 'dados-gerais';
    }

    private function saveVoToSession($id, $vo) {
        if (!session_id()) {
            session_start();
        }
        $_SESSION['estagio_vo'] = $vo;
    }

}
