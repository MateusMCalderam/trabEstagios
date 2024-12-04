<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="./trabEstagios">
    <title>Lista de Empresas</title>
</head>
<body>
    <?php include("includes/navbarAdmin.php"); ?>
    <h1>Lista de Empresas</h1>
    <a href="./empresas/form">Cadastrar Empresa</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>CNPJ</th>
                <th>Representante</th>
                <th>CPF Representante</th>
                <th>RG Representante</th>
                <th>Função Representante</th>
                <th>Número do Convênio</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empresas as $empresa): ?>
                <tr>
                    <td><?php echo $empresa->getId(); ?></td>
                    <td><?php echo $empresa->getNome(); ?></td>
                    <td><?php echo $empresa->getEndereco(); ?></td>
                    <td><?php echo $empresa->getCnpj(); ?></td>
                    <td><?php echo $empresa->getRepresentante(); ?></td>
                    <td><?php echo $empresa->getCpfRepresentante(); ?></td>
                    <td><?php echo $empresa->getRgRepresentante(); ?></td>
                    <td><?php echo $empresa->getFuncaoRepresentante(); ?></td>
                    <td><?php echo $empresa->getNumConvenio(); ?></td>
                    <td><?php echo $empresa->getTelefone(); ?></td>
                    <td><?php echo $empresa->getEmail(); ?></td>
                    <td>
                        <a href="./empresas/form?id=<?= $empresa->getId(); ?>" class="edit">Editar</a>
                        <br>
                        <a href="./empresas/remove?id=<?= $empresa->getId(); ?>" class="remove">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
