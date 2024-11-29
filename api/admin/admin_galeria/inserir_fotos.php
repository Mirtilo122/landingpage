<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__ . '/../../') . '/'); 
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/'); 
}

require_once BASE_PATH . 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imagem'])) {
    $imagem = $_FILES['imagem'];
    $nomeImagem = uniqid() . "_" . basename($imagem['name']);
    $caminho = "uploads/" . $nomeImagem;

    if (move_uploaded_file($imagem['tmp_name'], $caminho)) {
        $sql = "INSERT INTO fotos (imagem, visivel) VALUES (:imagem, 'sim')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':imagem' => $nomeImagem]);
        echo "Foto adicionada com sucesso!";
        header('Location: gerenciar_imagens.php');
        exit();
    } else {
        echo "Erro ao fazer upload da imagem.";
        header('Location: gerenciar_imagens.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container mt-5">
        <h1>Adicionar Foto</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="imagem" class="form-label">Selecione uma imagem:</label>
                <input type="file" name="imagem" id="imagem" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Foto</button>
        </form>
    </div>
</body>
</html>
