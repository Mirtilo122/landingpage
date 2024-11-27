<?php


if (!defined('BASE_PATH')) {
    define('BASE_PATH', __DIR__ . '../');
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/');
}


require_once __DIR__ . '/../conexao.php';

// Busca as notícias
$sql = "SELECT id, titulo, data_publicacao FROM noticias ORDER BY data_publicacao DESC";
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
    <link rel="stylesheet" href="../css/main.css">
    <style>
        .container{
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div class="espacodaheaderkkkkkkk"></div>
    <div class="espacodaheaderkkkkkkk"></div>
    <div class="container">
        <h1>Notícias Recentes</h1>
        <ul>
            <?php foreach ($noticias as $noticia): ?>
                <li>
                    <a href="noticia.php?id=<?= $noticia['id'] ?>">
                        <?= htmlspecialchars($noticia['titulo']) ?> - 
                        <small><?= $noticia['data_publicacao'] ?></small>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php include '../partes_essenciais/footer.php'; ?>

    <?php include '../partes_essenciais/header.php'; ?>
</body>
</html>
