<?php

namespace Model;

use Model\VO\UserVO;
use Model\Database;

final class UserModel extends Model
{
    public function selectAll($vo){
        $db = new Database();
        $query = "SELECT * FROM usuario";
        $data = $db->select($query);

        $arrayList = [];

        foreach ($data as $row) {
            $vo = new UserVO(
                $row['id'], 
                $row['login'], 
                $row['senha'], 
                $row['nivel'], 
                $row['idEmpresa'], 
                $row['idEstudante'], 
                $row['idProfessor']
            );
            array_push($arrayList, $vo);
        }

        return $arrayList;
    }

    public function selectOne($vo){
        $db = new Database();
        $query = "SELECT * FROM usuario WHERE id = :id";
        $binds = [':id' => $vo->getId()];

        $data = $db->select($query, $binds);

        return new UserVO(
            $data[0]['id'], 
            $data[0]['login'], 
            $data[0]['senha'], 
            $data[0]['nivel'], 
            $data[0]['idEmpresa'], 
            $data[0]['idEstudante'], 
            $data[0]['idProfessor']
        );
    }

    public function insert($vo){
        $db = new Database();
        $query = "INSERT INTO usuario (login, senha, nivel, idEmpresa, idEstudante, idProfessor) 
                    VALUES (:login, :senha, :nivel, :idEmpresa, :idEstudante, :idProfessor)";
        $binds = [
            ":login" => $vo->getLogin(),
            ":senha" => md5($vo->getSenha()),
            ":nivel" => $vo->getNivel(),
            ":idEmpresa" => $vo->getIdEmpresa(),
            ":idEstudante" => $vo->getIdEstudante(),
            ":idProfessor" => $vo->getIdProfessor(),
        ];

        return $db->execute($query, $binds);
    }

    public function update($vo){
        $db = new Database();
        if(empty($vo->getSenha())){
            $query = "UPDATE usuario SET login = :login, nivel = :nivel, 
                      idEmpresa = :idEmpresa, idEstudante = :idEstudante, idProfessor = :idProfessor
                      WHERE id = :id";
            
            $binds = [
                ":login" => $vo->getLogin(),
                ":nivel" => $vo->getNivel(),
                ":idEmpresa" => $vo->getIdEmpresa(),
                ":idEstudante" => $vo->getIdEstudante(),
                ":idProfessor" => $vo->getIdProfessor(),
                ":id" => $vo->getId()
            ];
        } else {
            $query = "UPDATE usuario SET login = :login, senha = :senha, nivel = :nivel, 
                      idEmpresa = :idEmpresa, idEstudante = :idEstudante, idProfessor = :idProfessor
                      WHERE id = :id";
            $binds = [
                ":login" => $vo->getLogin(),
                ":senha" => md5($vo->getSenha()),
                ":nivel" => $vo->getNivel(),
                ":idEmpresa" => $vo->getIdEmpresa(),
                ":idEstudante" => $vo->getIdEstudante(),
                ":idProfessor" => $vo->getIdProfessor(),
                ":id" => $vo->getId()
            ];
        }

        return $db->execute($query, $binds);
    }

    public function delete($vo){
        $db = new Database();
        $query = "DELETE FROM usuario WHERE id = :id";
        $binds= [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }

    public function doLogin($vo){
        $db = new Database();
        $query = "SELECT * FROM usuario 
                WHERE login = :login AND senha = :senha";

        $binds = [
            ":login" => $vo->getLogin(),
            ":senha" => md5($vo->getSenha()),
        ];

        $data  = $db->select($query, $binds);

        if(count($data) == 0){
            return null;
        }

        $_SESSION['usuario'] = new UserVO(
            $data[0]['id'], 
            $data[0]['login'], 
            $data[0]['senha'], 
            $data[0]['nivel'], 
            $data[0]['idEmpresa'], 
            $data[0]['idEstudante'], 
            $data[0]['idProfessor']
        );

        return $_SESSION['usuario'];
    }
}
