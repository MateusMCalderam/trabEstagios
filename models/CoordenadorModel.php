<?php

namespace Model;

use Model\VO\CoordenadorVO;

final class CoordenadorModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT * FROM coordenador";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new CoordenadorVO($row["id"], $row["nome"], $row["email"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM coordenador WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new CoordenadorVO($data[0]["id"], $data[0]["nome"], $data[0]["email"]);
    }

    public function insert($vo) {
        $db = new Database();

        $query = "INSERT INTO coordenador (nome, email) VALUES (:nome, :email)";
        $binds = [
            ":nome" => $vo->getNome(),
            ":email" => $vo->getEmail(),
        ];
    

        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Database();

        $query = "UPDATE coordenador SET nome = :nome, email = :email WHERE id = :id";
        $binds = [
            ":nome" => $vo->getNome(),
            ":email" => $vo->getEmail(),
            ":id" => $vo->getId()
        ];
        

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM coordenador WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }



}