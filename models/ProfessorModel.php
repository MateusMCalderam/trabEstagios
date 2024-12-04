<?php

namespace Model;

use Model\VO\ProfessorVO;

final class ProfessorModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT * FROM professor";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new ProfessorVO($row["id"], $row["nome"], $row["email"], $row["siape"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM professor WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new ProfessorVO($data[0]["id"], $data[0]["nome"], $data[0]["email"], $data[0]["siape"]);
    }

    public function insert($vo) {
        $db = new Database();

        $query = "INSERT INTO professor (nome, email, siape) VALUES (:nome, :email, :siape)";
        $binds = [
            ":nome" => $vo->getNome(),
            ":email" => $vo->getEmail(),
            ":siape" => $vo->getSiape()
        ];

        $result = $db->execute($query, $binds);

        if ($result) {
            $lastId = $db->getLastInsertedId();
            return $this->selectOne(new ProfessorVO($lastId));
        }
    
        return false; 
    }

    public function update($vo) {
        $db = new Database();

        print_r($vo);

        $query = "UPDATE professor SET nome = :nome, email = :email, siape = :siape WHERE id = :id";
        $binds = [
            ":nome" => $vo->getNome(),
            ":email" => $vo->getEmail(),
            ":siape" => $vo->getSiape(),
            ":id" => $vo->getId()
        ];
        

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM professor WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }



}