<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__ . '/../../') . '/'); 
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/'); 
}


require_once BASE_PATH . 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Atualizar os dados do usuário
    $query = "UPDATE usuarios SET usuario = :usuario, email = :email, senha = :senha WHERE id = :id";
    $stmt = $pdo->prepare($query);

    if ($stmt->execute([':usuario' => $usuario, ':email' => $email, ':senha' => $senha, ':id' => $id])) {
        echo "<script>alert('Usuário atualizado com sucesso!'); window.location.href = 'gerenciar_users.php';</script>";
    } else {
        echo "Erro ao atualizar usuário.";
    }
} else {
    $id = $_GET['id'];

    // Buscar dados do usuário
    $query = "SELECT * FROM usuarios WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h1>Editar Usuário</h1>

    <form action="editar_usuario.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <div class="mb-3">
            <label for="usuario" class="form-label">Nome de Usuário</label>
            <input type="text" id="usuario" name="usuario" class="form-control" value="<?php echo htmlspecialchars($user['usuario']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" id="senha" name="senha" class="form-control" value="<?php echo htmlspecialchars($user['senha']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="gerenciar_users.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>

</body>
</html>
