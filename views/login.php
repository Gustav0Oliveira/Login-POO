<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <link rel="stylesheet" href="css/login-css.css">
</head>
<body>
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../config/database.php';
    require_once '../model/usuario.php';

    $db = new Database();
    $connection = $db->connect();

    $controllerUser  = new Usuario($connection);

    
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    
    $query = "SELECT * FROM usuario WHERE email = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    
    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        
        if (password_verify($senha, $usuario['senha'])) {
            
            $_SESSION['usuario_id'] = $usuario['id']; 
            $_SESSION['mensagem'] = "Login realizado com sucesso!";
            header("Location: home.php"); 
            exit();
        } else {
            
            $_SESSION['mensagem'] = "Senha incorreta. Tente novamente.";
        }
    } else {
        
        $_SESSION['mensagem'] = "Usuário não encontrado. Verifique seu e-mail.";
    }
}
?>
<?php if (isset($_SESSION['mensagem'])): ?>
    <p><?php echo $_SESSION['mensagem']; unset($_SESSION['mensagem']); ?></p>
<?php endif; ?>

    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <button type="home.php" class="btn">Entrar</button>
        </form>
        <div class="cadastro">
            <a href="cadastro.php">Cadastrar-se</a>
        </div>
    </div>
    
</body>
</html>
