<?php

namespace Model;

use Model\VO\RepresentanteEmpresaVO;

final class RepresentanteEmpresaModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT * FROM representanteempresa";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new RepresentanteEmpresaVO($row["id"], $row["nome"], $row["funcao"], $row["cpf"], $row["rg"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM representanteempresa WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new RepresentanteEmpresaVO($data[0]["id"], $data[0]["nome"], $data[0]["funcao"], $data[0]["cpf"], $data[0]["rg"],);
    }

    public function insert($vo) {
        $db = new Database();

        $query = "INSERT INTO representanteempresa (nome, funcao, cpf, rg) VALUES 
        (:nome, :funcao, :cpf, :rg)";
        $binds = [
            ":nome" => $vo->getNome(),
            ":funcao" => $vo->getFuncao(),
            ":cpf" => $vo->getCpf(),
            ":rg" => $vo->getRg(),
        ];
    

        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Database();

        $query = "UPDATE representanteempresa SET nome = :nome, funcao = :funcao, cpf = :cpf, rg = :rg WHERE id = :id";
        $binds = [
            ":nome" => $vo->getNome(),
            ":funcao" => $vo->getfuncao(),
            ":cpf" => $vo->getCpf(),
            ":rg" => $vo->getRg(),
            ":id" => $vo->getId()
        ];
        

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM representanteempresa WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }



}