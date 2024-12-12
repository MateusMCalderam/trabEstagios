<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="./trabEstagios">
    <link rel="stylesheet" href="css/list.css">
    <title>Lista de Estágios</title>
</head>
<body>
    <?php include("includes/navbarAdmin.php"); ?>
    <div class="body">
        <h2>Lista de Estágios</h2>
        <a href="./estagios/form" class="cadastrar">Cadastrar Estágio</a>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Período</th>
                    <th>Área</th>
                    <th>Carga Horária</th>
                    <th>Estudante</th>
                    <th>Orientador</th>
                    <th>Supervisor</th>
                    <th>Empresa</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($estagios as $estagio): ?>
                    <tr>
                        <td><?php echo $estagio->getId(); ?></td>
                        <td><?php echo $estagio->getPeriodo(); ?></td>
                        <td><?php echo $estagio->getArea(); ?></td>
                        <td><?php echo $estagio->getCargaHoraria(); ?></td>
                        <td><?php echo $estagio->getIdEstudante(); ?></td>
                        <td><?php echo $estagio->getIdOrientador(); ?></td>
                        <td><?php echo $estagio->getNomeSupervisor(); ?></td>
                        <td><?php echo $estagio->getIdEmpresa(); ?></td>
                        <td>
                            <a href="./estagios/form?id=<?= $estagio->getId(); ?>" class="edit">Editar</a>
                            <br>
                            <a href="./estagios/remove?id=<?= $estagio->getId(); ?>" class="remove">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
