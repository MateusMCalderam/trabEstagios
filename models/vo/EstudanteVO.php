<?php

namespace Model\VO;

final class EstudanteVO extends VO {

    private $nome;
    private $matricula;
    private $curso;
    private $cpf;
    private $rg;
    private $cidade;
    private $telefone;
    private $endereco;
    private $email;

    public function __construct($id = 0, $nome = "", $matricula = "", $curso = '',$cpf = 0 , $rg = 0 , $cidade = '' , $telefone = 0 ,  $endereco = '',  $email = '') {
        parent::__construct($id);
        $this->nome = $nome;
        $this->matricula = $matricula;
        $this->curso = $curso;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->cidade = $cidade;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
        $this->email = $email;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    public function getCurso() {
        return $this->curso;
    }

    public function setCurso($curso) {
        $this->curso = $curso;
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
    public function getCidade() {
        return $this->cidade;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }
    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
}