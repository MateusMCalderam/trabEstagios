<?php

namespace Model\VO;

final class CursoVO extends VO {

    private $nome;
    private $idOrientador;
    private $emailOrientador;

    public function __construct($id = 0, $nome = "", $idOrientador = "", $emailOrientador = '') {
        parent::__construct($id);
        $this->nome = $nome;
        $this->idOrientador = $idOrientador;
        $this->emailOrientador = $emailOrientador;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getIdOrientador() {
        return $this->idOrientador;
    }

    public function setIdOrientador($idOrientador) {
        $this->idOrientador = $idOrientador;
    }

    public function getEmailOrientador() {
        return $this->emailOrientador;
    }

    public function setEmailOrientador($emailOrientador) {
        $this->emailOrientador = $emailOrientador;
    }
}