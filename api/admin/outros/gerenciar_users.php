<?php

if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__ . '/../../') . '/'); 
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/'); 
}


require_once BASE_PATH . 'conexao.php';

$linkParaHeader = $_SERVER['DOCUMENT_ROOT'] . '/landingpages/admin/header_admin.php';
$linkParaCss = "../css/main.css";



$query = "SELECT id, usuario, email, senha FROM usuarios";
$stmt = $pdo->query($query);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $linkParaCss; ?>">
</head>
<body>
    
<div class="espacodaheaderkkkkkkk"></div>

<div class="espacodaheaderkkkkkkk"></div>

<div class="container mt-4">
    <h1>Gerenciador de Usuários</h1>
    <a href="adicionar_users.php" class="btn btn-primary mb-3">Adicionar Novo Usuário</a>

    <div class="row">
        <?php foreach ($users as $user): ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($user['usuario']); ?></h5>
                        <p class="card-text">Email: <?php echo htmlspecialchars($user['email']); ?></p>
                        <p class="card-text">Senha: <?php echo htmlspecialchars($user['senha']); ?></p>
                        <a href="editar_usuario.php?id=<?php echo $user['id']; ?>" class="btn btn-warning">Editar</a>
                        <a href="excluir_usuario.php?id=<?php echo $user['id']; ?>" class="btn btn-danger">Excluir</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include($linkParaHeader); ?>
</body>
</html>
