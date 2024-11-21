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
            $vo = new EstudanteVO($row["id"], $row["nome"], $row["matricula"], $row["curso"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM estudante WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new EstudanteVO($data[0]["id"], $data[0]["nome"], $data[0]["matricula"], $data[0]["curso"]);
    }

    public function insert($vo) {
        $db = new Database();

        if(empty($vo->getCurso())){
            $query = "INSERT INTO estudante (nome, matricula ) VALUES (:nome, :matricula)";
            $binds = [
                ":nome" => $vo->getNome(),
                ":matricula" => $vo->getMatricula(),
            ];
        }else{
            $query = "INSERT INTO estudante (nome, matricula, curso) VALUES (:nome, :matricula, :curso)";
            $binds = [
                ":nome" => $vo->getNome(),
                ":matricula" => $vo->getMatricula(),
                ":curso" => $vo->getCurso()
            ];
        }
        

        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Database();

        if(empty($vo->getCurso())){
            $query = "UPDATE estudante SET nome = :nome, matricula = :matricula WHERE id = :id";
            $binds = [
                ":nome" => $vo->getNome(),
                ":matricula" => $vo->getMatricula(),
                ":id" => $vo->getId()
            ];
        }else{
            $query = "UPDATE estudante SET nome = :nome, matricula = :matricula, curso = :curso WHERE id = :id";
            $binds = [
                ":nome" => $vo->getNome(),
                ":matricula" => $vo->getMatricula(),
                ":id" => $vo->getId(),
                ":curso" => $vo->getCurso()
            ];
        }
        

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM estudante WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }



}