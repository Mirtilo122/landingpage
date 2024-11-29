<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__ . '/../..') . '/'); 
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/'); 
}

require_once BASE_PATH . 'conexao.php';

// Obter todas as fotos
$sql = "SELECT id, imagem, DATE(data) AS data_foto FROM fotos ORDER BY data DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$fotos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Deletar imagem
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $id = $_POST['id'];

    // Obter o nome do arquivo da imagem
    $sql = "SELECT imagem FROM fotos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $imagem = $stmt->fetch(PDO::FETCH_ASSOC)['imagem'];

    // Excluir o arquivo do servidor
    if ($imagem && file_exists("uploads/" . $imagem)) {
        unlink("uploads/" . $imagem);
    }

    // Remover do banco de dados
    $sql = "DELETE FROM fotos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);

    header('Location: gerenciar_imagens.php'); // Redireciona para atualizar a lista
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Imagens</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<div class="espacodaheaderkkkkkkk"></div>
<div class="espacodaheaderkkkkkkk"></div>
<div class="container mt-5" style="min-height: 100vh;">
    <h1 class="mb-4">Gerenciar Imagens</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Preview</th>
                <th>Nome</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fotos as $foto): ?>
                <tr>
                    <td>
                        <img src="uploads/<?php echo htmlspecialchars($foto['imagem']); ?>" alt="Preview" style="width: 100px; height: auto; border-radius: 5px;">
                    </td>
                    <td><?php echo htmlspecialchars($foto['imagem']); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($foto['data_foto'])); ?></td>
                    <td>
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="id" value="<?php echo $foto['id']; ?>">
                            <button type="submit" name="delete" class="btn btn-danger btn-sm">Deletar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>    
</div>
    <?php include '../header_admin.php' ; ?>
</body>
</html>
