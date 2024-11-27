<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__ . '/../../') . '/'); 
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/'); 
}

require_once BASE_PATH . 'conexao.php';

$linkParaHeader = 'header_noticias.php';
$linkParaCss = "../css/main.css";

// Verifica se há uma requisição para excluir uma notícia
if (isset($_GET['excluir_id'])) {
    $idExcluir = (int)$_GET['excluir_id']; // Obtém o ID da notícia a ser excluída
    
    // Prepara e executa a query para excluir a notícia
    $sqlExcluir = "DELETE FROM noticias WHERE id = :id";
    $stmtExcluir = $pdo->prepare($sqlExcluir);
    $stmtExcluir->bindParam(':id', $idExcluir, PDO::PARAM_INT);
    
    if ($stmtExcluir->execute()) {
        echo "<p>Notícia excluída com sucesso!</p>";
    } else {
        echo "<p>Erro ao excluir a notícia.</p>";
    }
}

if (isset($_POST['toggleDestaque'])) {
    $id = (int)$_POST['id'];

    // Alterna o estado de destaque
    $sqlToggle = "UPDATE noticias SET destaque = NOT destaque WHERE id = :id";
    $stmtToggle = $pdo->prepare($sqlToggle);
    $stmtToggle->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmtToggle->execute()) {
        echo "<p class='alert alert-success'>Estado de destaque alterado com sucesso!</p>";
    } else {
        echo "<p class='alert alert-danger'>Erro ao alterar o estado de destaque.</p>";
    }
}

$sql = "SELECT id, titulo, data_publicacao, destaque FROM noticias ORDER BY data_publicacao DESC";
$stmt = $pdo->query($sql);
$noticias = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notícias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $linkParaCss; ?>">
</head>
<body>
    
    <div class="espacodaheaderkkkkkkk"></div>

    <div class="espacodaheaderkkkkkkk"></div>

    <div class="container">
        <h1>Notícias Recentes</h1>

        <!-- Botão para adicionar nova notícia -->
        <a href="nova-noticia.php" class="btn btn-success mb-3">Adicionar Nova Notícia</a>

        <ul class="list-group">
            <?php foreach ($noticias as $noticia): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <a href="noticia.php?id=<?= $noticia['id'] ?>" class="text-decoration-none">
                            <?= htmlspecialchars($noticia['titulo']) ?> 
                        </a>
                        <small class="text-muted">(<?= $noticia['data_publicacao'] ?>)</small>
                    </div>
                    <div>
                        <!-- Botão de destaque -->
                        <form action="" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $noticia['id'] ?>">
                            <button type="submit" name="toggleDestaque" class="btn btn-sm <?= $noticia['destaque'] ? 'btn-warning' : 'btn-outline-warning' ?>">
                                <?= $noticia['destaque'] ? 'Remover Destaque' : 'Destacar' ?>
                            </button>
                        </form>
                <!-- Botão de excluir -->
                        <a href="?excluir_id=<?= $noticia['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Você tem certeza que deseja excluir esta notícia?');">Excluir</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>

    </div>
    
    <?php include($linkParaHeader); ?>
</body>
</html>
