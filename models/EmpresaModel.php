<?php

namespace Model;

use Model\VO\EmpresaVO;

final class EmpresaModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT * FROM empresa";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new EmpresaVO($row["id"], $row["nome"], $row["supervisor"], $row["endereco"], $row["cnpj"], $row["representante"], 
            $row["numConvenio"], $row["telefone"], $row["email"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM empresa WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new EmpresaVO($data[0]["id"], $data[0]["nome"], $data[0]["supervisor"], $data[0]["endereco"], $data[0]["cnpj"], 
        $data[0]["representante"], $data[0]["numConvenio"], $data[0]["telefone"], $data[0]["email"]);
    }

    public function insert($vo) {
        $db = new Database();

        $query = "INSERT INTO empresa (nome, supervisor, endereco, cnpj, representante, numConvenio, telefone, email) VALUES 
        (:nome, :supervisor, :endereco, :cnpj, :representante, :numConvenio, :telefone, :email)";
        $binds = [
            ":nome" => $vo->getNome(),
            ":supervisor" => $vo->getSupervisor(),
            ":endereco" => $vo->getEndereco(),
            ":cnpj" => $vo->getCnpj(),
            ":representante" => $vo->getRepresentante(),
            ":numConvenio" => $vo->getNumConvenio(),
            ":telefone" => $vo->getTelefone(),
            ":email" => $vo->getEmail(),
        ];
    

        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Database();

        $query = "UPDATE empresa SET nome = :nome, supervisor = :supervisor, endereco = :endereco, cnpj = :cnpj, representante = :representante, 
        numConvenio = :numConvenio, telefone = :telefone, email = :email WHERE id = :id";
        $binds = [
            ":nome" => $vo->getNome(),
            ":supervisor" => $vo->getSupervisor(),
            ":endereco" => $vo->getEndereco(),
            ":cnpj" => $vo->getCnpj(),
            ":representante" => $vo->getRepresentante(),
            ":numConvenio" => $vo->getNumConvenio(),
            ":telefone" => $vo->getTelefone(),
            ":email" => $vo->getEmail(),
            ":id" => $vo->getId()
        ];
        

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM empresa WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }



}