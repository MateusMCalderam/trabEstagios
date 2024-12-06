<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="./trabEstagios">
    <title>Recuperação de Senha</title>
</head>
<body>
    <h2>Recuperação de Senha</h2>
    <?php
    if (isset($erro)) {
      echo $erro;
    }
    ?>
    <br>
    <br>
    <form action="./enviarRecuperacao" method="POST">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required placeholder="Digite seu e-mail">
        <br>
        <button type="submit">Enviar link</button>
    </form>
    <p><a href="./login">Voltar ao login</a></p>
</body>
</html>
