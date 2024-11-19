<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="css/cadastro-css.css">
</head>
<body>
<?php
if (isset($_POST['nome'])) {
    require_once '../config/database.php';
    require_once '../model/usuario.php';

    $db = new Database();
    $connection = $db->connect();

    $controllerUser   = new Usuario($connection);

    if ($controllerUser ->create($_POST['nome'], $_POST['data_nasc'], $_POST['email'], $_POST['endereco'], $_POST['senha'])) {
        header("Location: login.php");
        exit();
    } else {
        echo "<p>Erro ao cadastrar usuário. Tente novamente.</p>";
    }
}
?>

<div class="cadastro-container">
    <h1>Cadastro de Usuário</h1>
    <form action="cadastro.php" method="POST">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="data_nasc">Data de Nascimento:</label>
            <input type="date" id="data_nasc" name="data_nasc" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
        </div>
        <button type="submit" class="btn">Cadastrar</button>
    </form>
</div>
</body>
</html>