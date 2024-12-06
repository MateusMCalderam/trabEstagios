<?php

namespace Model;

use Model\VO\UserVO;
use Model\Database;

final class UserModel extends Model
{
    public function selectAll($vo)
    {
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

    public function selectOne($vo)
    {
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

    public function insert($vo)
    {
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

    public function update($vo)
    {
        $db = new Database();
        if (empty($vo->getSenha())) {
            $query = "UPDATE usuario SET login = :login, nivel = :nivel
                      WHERE id = :id";

            $binds = [
                ":login" => $vo->getLogin(),
                ":nivel" => $vo->getNivel(),
                ":id" => $vo->getId()
            ];
        } else {
            $query = "UPDATE usuario SET login = :login, senha = :senha, nivel = :nivel
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

    public function updatePassword($id, $password)
    {
        $db = new Database();
        $query = "UPDATE usuario SET senha = :senha
                    WHERE id = :id";
        $binds = [
            ":senha" => md5($password),
            ":id" => $id
        ];

        return $db->execute($query, $binds);
    }

    public function delete($vo)
    {
        $db = new Database();
        $query = "DELETE FROM usuario WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }

    public function doLogin($vo)
    {
        $db = new Database();
        $query = "SELECT * FROM usuario 
                WHERE login = :login AND senha = :senha";

        $binds = [
            ":login" => $vo->getLogin(),
            ":senha" => md5($vo->getSenha()),
        ];

        $data = $db->select($query, $binds);

        if (count($data) == 0) {
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

    function verificaEmail($email) {
        $db = new Database();
        $query = "SELECT u.*
                FROM usuario u
                LEFT JOIN professor p ON u.idProfessor = p.id
                LEFT JOIN estudante e ON u.idEstudante = e.id
                LEFT JOIN empresa em ON u.idEmpresa = em.id
                WHERE p.email = :email OR e.email = :email OR em.email = :email
                LIMIT 1";
    
        $binds = [':email' => $email];
        $data = $db->select($query, $binds);
        
        if (!empty($data)) {
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
        
        return $data;
    }

    public function updateRecoveryToken($userId, $token, $tokenExpiration)
    {
        $db = new Database();
        $query = "UPDATE usuario SET token_recuperacao = :token, token_expiracao = :token_expiracao WHERE id = :id";
        $binds = [
            ":token" => $token,
            ":token_expiracao" => $tokenExpiration,
            ":id" => $userId
        ];
        return $db->execute($query, $binds);
    }


    public function validateRecoveryToken($token)
    {
        $db = new Database();

        // Consulta para verificar o token e sua validade
        $query = "SELECT id, token_expiracao FROM usuario WHERE token_recuperacao = :token";
        $binds = [":token" => $token];
        $data = $db->select($query, $binds);

        if (empty($data)) {
            // Token inválido
            return [
                'status' => false,
                'message' => 'Token de recuperação inválido.',
            ];
        }

        $tokenExpiration = $data[0]['token_expiracao'];
        $currentTime = date('Y-m-d H:i:s');

        if ($currentTime > $tokenExpiration) {
            // Token expirado
            return [
                'status' => false,
                'message' => 'O token de recuperação expirou.',
            ];
        }

        // Token válido
        return [
            'status' => true,
            'userId' => $data[0]['id'],
        ];
    }
}
