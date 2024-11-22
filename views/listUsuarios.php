<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0x">
        <base href="./trabEstagios">
        <title>Lista de Usuários</title>
    </head>
    <body>
    <?php include("includes/navbarAdmin.php"); ?>
    <h1>Lista de Usuários</h1>
    <a href="./usuarios/form">Cadastrar Usuário</a>
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
                        <a href="./usuarios/form?id=<?= $usuario->getId(); ?>" class="edit">Editar</a>
                        <br>
                        <a href="./usuarios/remove?id=<?= $usuario->getId(); ?>" class="remove">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
