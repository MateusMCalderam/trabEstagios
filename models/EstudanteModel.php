<?php

namespace Model;

use Model\VO\EstudanteVO;

final class EstudanteModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT * FROM estudante";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new EstudanteVO($row["id"], $row["nome"], $row["matricula"], $row["curso"], $row["cpf"], $row["rg"], $row["cidade"], $row["telefone"], $row["email"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM estudante WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new EstudanteVO($data[0]["id"], $data[0]["nome"], $data[0]["matricula"], $data[0]["curso"], $data[0]["cpf"], $data[0]["rg"], $data[0]["cidade"], $data[0]["telefone"], $data[0]["email"]);
    }

    public function insert($vo) {
        $db = new Database();

        $query = "INSERT INTO estudante (nome, matricula, curso, cpf, rg, cidade, telefone, email) VALUES (:nome, :matricula, :curso, :cpf, :rg, :cidade, :telefone, :email)";
        $binds = [
            ":nome" => $vo->getNome(),
            ":matricula" => $vo->getMatricula(),
            ":curso" => $vo->getCurso(),
            ":cpf" => $vo->getCurso(),
            ":rg" => $vo->getRg(),
            ":cidade" => $vo->getCidade(),
            ":telefone" => $vo->getTelefone(),
            ":email" => $vo->getEmail(),
        ];
    

        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Database();

        $query = "UPDATE estudante SET nome = :nome, matricula = :matricula, curso = :curso, cpf = :cpf, rg = :rg, 
        cidade = :cidade, telefone = :telefone, email = :email WHERE id = :id";
        $binds = [
            ":nome" => $vo->getNome(),
            ":matricula" => $vo->getMatricula(),
            ":curso" => $vo->getCurso(),
            ":cpf" => $vo->getCurso(),
            ":rg" => $vo->getRg(),
            ":cidade" => $vo->getCidade(),
            ":telefone" => $vo->getTelefone(),
            ":email" => $vo->getEmail(),
            ":id" => $vo->getId()
        ];
        

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM estudante WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }



}