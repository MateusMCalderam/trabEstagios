<?php

namespace Model;

use Model\VO\CidadeVO;

final class CidadeModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT * FROM cidade";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new CidadeVO(
                $row["id"],
                $row["nome"],
                $row["cep"], 
            );
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM cidade WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new CidadeVO(
            $data[0]["id"],
            $data[0]["nome"],
            $data[0]["cep"],
        );
    }

    public function insert($vo) {
        $db = new Database();
        $query = "INSERT INTO cidade (nome, cep) 
                  VALUES (:nome, :cep)";
        $binds = [
            ":nome" => $vo->getNome(),
            ":cep" => $vo->getCep(),
        ];

        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Database();
        $query = "UPDATE cidade 
                  SET nome = :nome, cep = :cep WHERE id = :id";
        $binds = [
            ":nome" => $vo->getNome(),
            ":cep" => $vo->getCep(),
            ":id" => $vo->getId(),
        ];

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM cidade WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }
}
