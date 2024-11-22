<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <base href="./trabEstagios">
    <title>Estudantes</title>
</head>
<body>
    <h1>Formulário Estudante</h1>
    <form action="./save" method="POST">
        <input type="hidden" name="id" value="<?php echo $estudante->getId(); ?>">
        <input type="text" name="nome" value="<?php echo $estudante->getNome(); ?>" placeholder="Insira o nome do estudante:">
        <input type="text" name="matricula" value="<?php echo $estudante->getMatricula(); ?>" placeholder="Insira a matrícula do estudante:">
        <input type="text" name="curso" value="<?php echo $estudante->getCurso(); ?>" placeholder="Insira o curso do estudante:">
        <input type="" name="cpf" value="<?php echo $estudante->getCpf(); ?>" placeholder="Insira o CPF do estudante:">
        <input type="text" name="rg" value="<?php echo $estudante->getRg(); ?>" placeholder="Insira o RG do estudante:">
        <input type="text" name="endereco" value="<?php echo $estudante->getEndereco(); ?>" placeholder="Insira o endereço do estudante:">
        <input type="text" name="cidade" value="<?php echo $estudante->getCidade(); ?>" placeholder="Insira a cidade do estudante:">
        <input type="text" name="telefone" value="<?php echo $estudante->getTelefone(); ?>" placeholder="Insira o telefone do estudante:">
        <input type="email" name="email" value="<?php echo $estudante->getEmail(); ?>" placeholder="Insira o email do estudante:">
        <button type="submit">Salvar Estudante</button>
    </form>
</body>
</html>
