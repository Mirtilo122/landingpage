<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__ . '/../../') . '/'); 
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/'); 
}

require_once BASE_PATH . 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['documento'])) {
    // Pegando os dados do formulário
    $nome = $_POST['nome'];
    $file = $_FILES['documento'];

    // Verificando se o upload foi bem-sucedido
    if ($file['error'] === UPLOAD_ERR_OK) {
        // Definindo o diretório de uploads
        $uploadDir = 'uploads/';
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newFileName = uniqid('', true) . '.' . $fileExtension;  // Gerando nome único para o arquivo
        $filePath = $uploadDir . $newFileName;

        // Movendo o arquivo para o diretório de uploads
        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            // Inserir dados no banco
            $query = "INSERT INTO documentos (nome, root) VALUES (:nome, :root)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([':nome' => $nome, ':root' => $filePath]);

            echo "<script>alert('Documento adicionado com sucesso!'); window.location.href = 'gerenciar_documentacao.php';</script>";
        } else {
            echo "Erro ao mover o arquivo.";
        }
    } else {
        echo "Erro no upload do arquivo.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Documento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h1>Adicionar Novo Documento</h1>

    <form action="adicionar_documento.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Documento</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="documento" class="form-label">Selecione o Arquivo</label>
            <input type="file" id="documento" name="documento" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Adicionar</button>
        <a href="gerenciar_documentacao.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>

</body>
</html>
