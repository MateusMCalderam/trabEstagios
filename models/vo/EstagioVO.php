<?php

namespace Model\VO;

final class EstagioVO extends VO {

    private $periodo;
    private $area;
    private $cargaHoraria;
    private $idEstudante;
    private $idOrientador;
    private $idEmpresa;
    private $representante;
    private $idCidade;
    private $idCoorientador;
    private $nomeSupervisor;
    private $cargoSupervisor;
    private $telefoneSupervisor;
    private $emailSupervisor;
    private $tipoProcesso;
    private $encaminhamentos;
    private $planoAtividades;
    private $relatorioFinal;
    private $autoavaliacaoEmpresa;
    private $autoavaliacao;
    private $termoCompromisso;

    public function __construct($id = 0, $periodo = "", $area = "", $cargaHoraria = '',$idEstudante = 0 , $idOrientador = 0 , 
    $idEmpresa = '' , $representante = '' , $idCidade = '', $idCoorientador = '', $nomeSupervisor = '', $cargoSupervisor = '', 
    $telefoneSupervisor = '', $emailSupervisor = '', $tipoProcesso = '', $encaminhamentos = '', $planoAtividades = '', $relatorioFinal = '', 
    $autoavaliacaoEmpresa = '', $autoavaliacao = '', $termoCompromisso = '') {
        parent::__construct($id);
        $this->periodo = $periodo;
        $this->area = $area;
        $this->cargaHoraria = $cargaHoraria;
        $this->idEstudante = $idEstudante;
        $this->idOrientador = $idOrientador;
        $this->idEmpresa = $idEmpresa;
        $this->representante = $representante;
        $this->idCidade = $idCidade;
        $this->idCoorientador = $idCoorientador;
        $this->nomeSupervisor = $nomeSupervisor;
        $this->cargoSupervisor = $cargoSupervisor;
        $this->telefoneSupervisor = $telefoneSupervisor;
        $this->emailSupervisor = $emailSupervisor;
        $this->tipoProcesso = $tipoProcesso;
        $this->encaminhamentos = $encaminhamentos;
        $this->planoAtividades = $planoAtividades;
        $this->relatorioFinal = $relatorioFinal;
        $this->autoavaliacaoEmpresa = $autoavaliacaoEmpresa;
        $this->autoavaliacao = $autoavaliacao;
        $this->termoCompromisso = $termoCompromisso;
    }

    public function getPeriodo() {
        return $this->periodo;
    }

    public function setPeriodo($periodo) {
        $this->periodo = $periodo;
    }

    public function getArea() {
        return $this->area;
    }

    public function setArea($area) {
        $this->area = $area;
    }

    public function getCargaHoraria() {
        return $this->cargaHoraria;
    }

    public function setCargaHoraria($cargaHoraria) {
        $this->cargaHoraria = $cargaHoraria;
    }
    public function getIdEstudante() {
        return $this->idEstudante;
    }

    public function setIdEstudante($idEstudante) {
        $this->idEstudante = $idEstudante;
    }
    public function getIdOrientador() {
        return $this->idOrientador;
    }

    public function setIdOrientador($idOrientador) {
        $this->idOrientador = $idOrientador;
    }
    public function getIdEmpresa() {
        return $this->idEmpresa;
    }

    public function setIdEmpresa($idEmpresa) {
        $this->idEmpresa = $idEmpresa;
    }
    public function getRepresentante() {
        return $this->representante;
    }

    public function setRepresentante($representante) {
        $this->representante = $representante;
    }
    public function getIdCidade() {
        return $this->idCidade;
    }

    public function setIdCidade($idCidade) {
        $this->idCidade = $idCidade;
    }

    public function setIdCoorientador($idCoorientador) {
        $this->idCoorientador = $idCoorientador;
    }
    public function getIdCoorientador() {
        return $this->idCoorientador;
    }

    public function setNomeSupervisor($nomeSupervisor) {
        $this->nomeSupervisor = $nomeSupervisor;
    }
    public function getNomeSupervisor() {
        return $this->nomeSupervisor;
    }

    public function setCargoSupervisor($cargoSupervisor) {
        $this->cargoSupervisor = $cargoSupervisor;
    }
    public function getCargoSupervisor() {
        return $this->cargoSupervisor;
    }
    public function setTelefoneSupervisor($telefoneSupervisor) {
        $this->telefoneSupervisor = $telefoneSupervisor;
    }
    public function getTelefoneSupervisor() {
        return $this->telefoneSupervisor;
    }
    public function setEmailSupervisor($emailSupervisor) {
        $this->emailSupervisor = $emailSupervisor;
    }
    public function getEmailSupervisor() {
        return $this->emailSupervisor;
    }
    public function setTipoProcesso($tipoProcesso) {
        $this->tipoProcesso = $tipoProcesso;
    }
    public function getTipoProcesso() {
        return $this->tipoProcesso;
    }
    public function setEncaminhamentos($encaminhamentos) {
        $this->encaminhamentos = $encaminhamentos;
    }
    public function getEncaminhamentos() {
        return $this->encaminhamentos;
    }
    public function setPlanoAtividades($planoAtividades) {
        $this->planoAtividades = $planoAtividades;
    }
    public function getPlanoAtividades() {
        return $this->planoAtividades;
    }
    public function setRelatorioFinal($relatorioFinal) {
        $this->relatorioFinal = $relatorioFinal;
    }
    public function getRelatorioFinal() {
        return $this->relatorioFinal;
    }
    public function setAutoavaliacaoEmpresa($autoavaliacaoEmpresa) {
        $this->autoavaliacaoEmpresa = $autoavaliacaoEmpresa;
    }
    public function getAutoavaliacaoEmpresa() {
        return $this->autoavaliacaoEmpresa;
    }
    public function setAutoavaliacao($autoavaliacao) {
        $this->autoavaliacao = $autoavaliacao;
    }
    public function getAutoavaliacao() {
        return $this->autoavaliacao;
    }
    public function setTermoCompromisso($termoCompromisso) {
        $this->termoCompromisso = $termoCompromisso;
    }
    public function getTermoCompromisso() {
        return $this->termoCompromisso;
    }
    
}