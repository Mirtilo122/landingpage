<?php

if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__ . '/../../') . '/'); 
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/'); 
}


require_once BASE_PATH . 'conexao.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pegar os dados do formulário
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Preparar a consulta SQL para inserir o novo usuário
    $query = "INSERT INTO usuarios (usuario, email, senha) VALUES (:usuario, :email, :senha)";
    $stmt = $pdo->prepare($query);

    // Executar a consulta
    if ($stmt->execute([':usuario' => $usuario, ':email' => $email, ':senha' => $senha])) {
        echo "<script>alert('Usuário adicionado com sucesso!'); window.location.href = 'gerenciar_users.php';</script>";
    } else {
        echo "Erro ao adicionar usuário.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Novo Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h1>Adicionar Novo Usuário</h1>

    <form action="adicionar_users.php" method="POST">
        <div class="mb-3">
            <label for="usuario" class="form-label">Nome de Usuário</label>
            <input type="text" id="usuario" name="usuario" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" id="senha" name="senha" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Adicionar</button>
        <a href="gerenciar_users.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>

</body>
</html>
