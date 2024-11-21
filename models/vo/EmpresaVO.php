<?php

namespace Model\VO;

final class EmpresaVO extends VO {

    private $nome;
    private $supervisor;
    private $endereco;
    private $cnpj;
    private $representante;
    private $numConvenio;
    private $telefone;
    private $email;

    public function __construct($id = 0, $nome = "", $supervisor = "", $endereco = '',$cnpj = 0 , $representante = 0 , $numConvenio = '' , $telefone = 0 , $email = '') {
        parent::__construct($id);
        $this->nome = $nome;
        $this->supervisor = $supervisor;
        $this->endereco = $endereco;
        $this->cnpj = $cnpj;
        $this->representante = $representante;
        $this->numConvenio = $numConvenio;
        $this->telefone = $telefone;
        $this->email = $email;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getSupervisor() {
        return $this->supervisor;
    }

    public function setSupervisor($supervisor) {
        $this->supervisor = $supervisor;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }
    public function getCnpj() {
        return $this->cnpj;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }
    public function getRepresentante() {
        return $this->representante;
    }

    public function setRepresentante($representante) {
        $this->representante = $representante;
    }
    public function getNumConvenio() {
        return $this->numConvenio;
    }

    public function setNumConvenio($numConvenio) {
        $this->numConvenio = $numConvenio;
    }
    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
}