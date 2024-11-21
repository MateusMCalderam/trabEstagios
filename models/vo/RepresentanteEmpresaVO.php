<?php

namespace Model\VO;

final class RepresentanteEmpresaVO extends VO {

    private $nome;
    private $funcao;
    private $cpf;
    private $rg;

    public function __construct($id = 0, $nome = "", $funcao = '', $cpf = 0 , $rg = 0 ) {
        parent::__construct($id);
        $this->nome = $nome;
        $this->funcao = $funcao;
        $this->cpf = $cpf;
        $this->rg = $rg;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getFuncao() {
        return $this->funcao;
    }

    public function setFuncao($funcao) {
        $this->funcao = $funcao;
    }
    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }
    public function getRg() {
        return $this->rg;
    }

    public function setRg($rg) {
        $this->rg = $rg;
    }
}