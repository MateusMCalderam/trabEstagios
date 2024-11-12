<?php

namespace Model;

use Model\VO\UserVO;
use Model\Database;

final class UserModel extends Model
{
    public function selectAll($vo){
        $db = new Database();
        $query = "SELECT * FROM usuarios";
        $data = $db->select($query);

        $arrayList = [];

        foreach ($data as $row) {
            $vo = new UserVO($row['id'], $row['login'], $row['senha'], $row['nivel']);
            array_push($arrayList, $vo);
        }

        return $arrayList;
    }

    public function selectOne($vo){
        $db = new Database();
        $query = "SELECT * FROM usuarios WHERE id = :id";
        $binds = [':id' => $vo->getId()];

        $data = $db->select($query, $binds);

        return new UserVO($data[0]['id'], $data[0]['login'], $data[0]['senha'], $data[0]['nivel']);

    }
    
    public function insert($vo){
        $db = new Database();
        $query = "INSERT INTO usuarios (login, senha, nivel) 
                    VALUES (:login, :senha, :nivel)";
        $binds = [
            ":login" => $vo->getLogin(),
            ":senha" => md5($vo->getSenha()),
            ":nivel" => $vo->getNivel(),
        ];

        return $db->execute($query, $binds);
    }

    public function update($vo){
        $db = new Database();
        if(empty($vo->getSenha())){
            $query = "UPDATE usuarios SET login = :login, nivel = :nivel
            WHERE id = :id";
            
            $binds = [
                ":login" => $vo->getLogin(),
                ":nivel" => $vo->getNivel(),
                ":id" => $vo->getId()
            ];
        }else{
            
            $query = "UPDATE usuarios SET login = :login, 
                        senha = :senha, nivel = :nivel
                        WHERE id = :id";
            $binds = [
                ":login" => $vo->getLogin(),
                ":senha" => md5($vo->getSenha()),
                ":nivel" => $vo->getNivel(),
                ":id" => $vo->getId()
            ];
        }

        return $db->execute($query, $binds);
    }
    public function delete($vo){
        $db = new Database();
        $query = "DELETE FROM usuarios WHERE id = :id";
        $binds= [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }

    public function doLogin($vo){
        $db = new Database();
        $query = "SELECT * FROM usuarios 
                WHERE login = :login AND senha = :senha";

        $binds = [
            ":login" => $vo->getLogin(),
            ":senha" => md5($vo->getSenha()),
        ];

        $data  = $db->select($query, $binds);

        if(count($data) == 0){
            return null;
        }

        $_SESSION['usuario'] = new UserVO($data[0]['id'], $data[0]['login'], $data[0]['senha'], $data[0]['nivel']);

        return $_SESSION['usuario'];
    }
}
