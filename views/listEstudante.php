<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="./trabEstagios">
    <title>Lista de Estudantes</title>
</head>
<body>
    <?php include("includes/navbarAdmin.php"); ?>
    <h1>Lista de Estudantes</h1>
    <a href="./estudantes/form">Cadastrar Estudante</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Matrícula</th>
                <th>Curso</th>
                <th>CPF</th>
                <th>RG</th>
                <th>Endereço</th>
                <th>Cidade</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($estudantes as $estudante): ?>
                <tr>
                    <td><?php echo $estudante->getId(); ?></td>
                    <td><?php echo $estudante->getNome(); ?></td>
                    <td><?php echo $estudante->getMatricula(); ?></td>
                    <td><?php echo $estudante->getCurso(); ?></td>
                    <td><?php echo $estudante->getCpf(); ?></td>
                    <td><?php echo $estudante->getRg(); ?></td>
                    <td><?php echo $estudante->getEndereco(); ?></td>
                    <td><?php echo $estudante->getCidade(); ?></td>
                    <td><?php echo $estudante->getTelefone(); ?></td>
                    <td><?php echo $estudante->getEmail(); ?></td>
                    <td>
                        <a href="./estudantes/form?id=<?= $estudante->getId(); ?>" class="edit">Editar</a>
                        <br>
                        <a href="./estudantes/remove?id=<?= $estudante->getId(); ?>" class="remove">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>