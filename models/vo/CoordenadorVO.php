<?php

namespace Model\VO;

final class CoordenadorVO extends VO {

    private $nome;
    private $email;

    public function __construct($id = 0, $nome = "", $email = '') {
        parent::__construct($id);
        $this->nome = $nome;
        $this->email = $email;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
}