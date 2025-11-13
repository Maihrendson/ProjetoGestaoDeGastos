<?php 
defined('controle') or die('Acesso Negado');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'] ?? null;
    $senha = $_POST['senha'] ?? null;
    $erro = null;

    if (empty($usuario) || empty($senha)) {
        $erro = 'Preencha usuário e senha';
    }

    if (empty($erro)) {
        $usuarios = require_once __DIR__ . '/../inf/usuario.php';

        foreach ($usuarios as $user) {
            if ($user['usuario'] == $usuario && password_verify($senha, $user['senha'])) {
                $_SESSION['usuario'] = $usuario;
                header('Location: index.php?rota=home');
                exit;
            }
        }

        $erro = 'Usuário ou senha inválidos';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="index.php?rota=login" method="post">
        <h3>Login</h3>
        <div>
            <label for="usuario">Usuário:</label>
            <input type="email" name="usuario" id="usuario" required>
        </div> 
        <div>
            <label for="senha">Senha:<label>              
            <input type="password" name="senha" id="senha" required>
        </div> 
        <div>
           <button type="submit">Entrar</button> 
        </div>
    </form>

    <?php if (!empty($erro)): ?>
        <p style="color:red;"><?php echo $erro; ?></p>
    <?php endif; ?>
</body>
</html>