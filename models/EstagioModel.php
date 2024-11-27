<?php

namespace Model;

use Model\VO\EstagioVO;

final class EstagioModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT * FROM estagio";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new EstagioVO($row["id"], $row["periodo"], $row["area"], $row["cargaHoraria"], $row["idEstudante"], 
            $row["idOrientador"], $row["idEmpresa"], $row["representante"], $row["idCidade"], $row["idCoorientador"], 
            $row["nomeSupervisor"], $row["cargoSupervisor"], $row["telefoneSupervisor"], $row["emailSupervisor"], 
            $row["tipoProcesso"], $row["encaminhamentos"], $row["planoAtividades"], $row["relatorioFinal"], $row["autoavaliacaoEmpresa"], 
            $row["autoavaliacao"], $row["termoCompromisso"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM estagio WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new EstagioVO($data[0]["id"], $data[0]["periodo"], $data[0]["area"], $data[0]["cargaHoraria"], 
        $data[0]["idEstudante"], $data[0]["idOrientador"], $data[0]["idEmpresa"], $data[0]["representante"], $data[0]["idCidade"], 
        $row["idCoorientador"], $row["nomeSupervisor"], $row["cargoSupervisor"], $row["telefoneSupervisor"], 
        $row["emailSupervisor"], $row["tipoProcesso"], $row["encaminhamentos"], $row["planoAtividades"], 
        $row["relatorioFinal"], $row["autoavaliacaoEmpresa"], $row["autoavaliacao"], $row["termoCompromisso"]);
    }

    public function insert($vo) {
        $db = new Database();

        $query = "INSERT INTO estagio (periodo, area, cargaHoraria, idEstudante, rg, idEmpresa, representante, 
        idCidade, idCoorientador, nomeSupervisor, cargoSupervisor, telefoneSupervisor, emailSupervisor, tipoProcesso, 
        encaminhamentos, planoAtividades, relatorioFinal, autoavaliacaoEmpresa, autoavaliacao, termoCompromisso) VALUES 
        (:periodo, :area, :cargaHoraria, :idEstudante, :idOrientador, :idEmpresa, :representante, :idCidade, 
        :idCoorientador, :nomeSupervisor, :cargoSupervisor, :telefoneSupervisor, :emailSupervisor, :tipoProcesso, 
        :encaminhamentos, :planoAtividades, :relatorioFinal, :autoavaliacaoEmpresa, :autoavaliacao, :termoCompromisso)";
        $binds = [
            ":periodo" => $vo->getPeriodo(),
            ":area" => $vo->getArea(),
            ":cargaHoraria" => $vo->getCargaHoraria(),
            ":idEstudante" => $vo->getIdEstudante(),
            ":idOrientador" => $vo->getIdOrientador(),
            ":idEmpresa" => $vo->getIdEmpresa(),
            ":representante" => $vo->getRepresentante(),
            ":idCidade" => $vo->getIdCidade(),
            ":idCoorientador" => $vo->getIdCoorientador(),
            ":nomeSupervisor" => $vo->getNomeSupervisor(),
            ":cargoSupervisor" => $vo->getCargoSupervisor(),
            ":telefoneSupervisor" => $vo->getTelefoneSupervisor(),
            ":emailSupervisor" => $vo->getEmailSupervisor(),
            ":tipoProcesso" => $vo->getTipoProcesso(),
            ":encaminhamentos" => $vo->getEncaminhamentos(),
            ":planoAtividades" => $vo->getPlanoAtividades(),
            ":relatorioFinal" => $vo->getRelatorioFinal(),
            ":autoavaliacaoEmpresa" => $vo->getAutoavaliacaoEmpresa(),
            ":autoavaliacao" => $vo->getAutoavaliacao(),
            ":termoCompromisso" => $vo->getTermoCompromisso(),
        ];
    

        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Database();

        $query = "UPDATE estagio SET periodo = :periodo, area = :area, cargaHoraria = :cargaHoraria, idEstudante = :idEstudante, idOrientador = :idOrientador, 
        idEmpresa = :idEmpresa, representante = :representante, idCidade = :idCidade, 
        idCoorientador = :idCoorientador, nomeSupervisor = :nomeSupervisor, cargoSupervisor = :cargoSupervisor, 
        telefoneSupervisor = :telefoneSupervisor, emailSupervisor = :emailSupervisor, 
        tipoProcesso = :tipoProcesso, encaminhamentos = :encaminhamentos, planoAtividades = :planoAtividades, 
        relatorioFinal = :relatorioFinal, autoavaliacaoEmpresa = :autoavaliacaoEmpresa, autoavaliacao = :autoavaliacao, termoCompromisso = :termoCompromisso  WHERE id = :id";
        $binds = [
            ":periodo" => $vo->getPeriodo(),
            ":area" => $vo->getArea(),
            ":cargaHoraria" => $vo->getCargaHoraria(),
            ":idEstudante" => $vo->getIdEstudante(),
            ":idOrientador" => $vo->getIdOrientador(),
            ":idEmpresa" => $vo->getIdEmpresa(),
            ":representante" => $vo->getRepresentante(),
            ":idCidade" => $vo->getIdCidade(),
            ":idCoorientador" => $vo->getIdCoorientador(),
            ":nomeSupervisor" => $vo->getNomeSupervisor(),
            ":cargoSupervisor" => $vo->getCargoSupervisor(),
            ":telefoneSupervisor" => $vo->getTelefoneSupervisor(),
            ":emailSupervisor" => $vo->getEmailSupervisor(),
            ":tipoProcesso" => $vo->getTipoProcesso(),
            ":encaminhamentos" => $vo->getEncaminhamentos(),
            ":planoAtividades" => $vo->getPlanoAtividades(),
            ":relatorioFinal" => $vo->getRelatorioFinal(),
            ":autoavaliacaoEmpresa" => $vo->getAutoavaliacaoEmpresa(),
            ":autoavaliacao" => $vo->getAutoavaliacao(),
            ":termoCompromisso" => $vo->getTermoCompromisso(),
            ":id" => $vo->getId()
        ];
        

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM estagio WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }



}