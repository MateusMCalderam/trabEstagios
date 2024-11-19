<?php include("includes/navbarAdmin.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
</head>
<body>
    <h1>Lista de Usuários</h1>
    <a href="./usuario.php">Cadastrar Usuário</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Nível</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo $usuario->getId(); ?></td>
                    <td><?php echo $usuario->getLogin(); ?></td>
                    <td><?php echo $usuario->getNivel(); ?></td>
                    <td>
                        <a href="usuario.php?id=<?= $usuario->getId(); ?>" class="edit">Editar</a>
                        <br>
                        <a href="removerUsuario.php?id=<?= $usuario->getId(); ?>" class="remove">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
