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
    <link rel="stylesheet" href="<?php echo $linkParaCss; ?>">
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
    
    <?php include($linkParaHeader); ?>
</body>
</html>
