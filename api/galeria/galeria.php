<?php

if (!defined('BASE_PATH')) {
    define('BASE_PATH', __DIR__ . '../');
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/');
}

require_once __DIR__ . '/../conexao.php';

$linkParaHeader = $_SERVER['DOCUMENT_ROOT'] . '/landingpages/partes_essenciais/header.php';
$linkParaCss = BASE_URL . '/css/main.css';

// Selecionar apenas as fotos visíveis
$sql = "SELECT * FROM fotos WHERE visivel = 'sim' ORDER BY data DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$fotos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Fotos</title>
    <link rel="stylesheet" href="<?php echo $linkParaCss; ?>">
</head>
<body>
    <div class="gallery">
        <?php foreach ($fotos as $foto): ?>
            <div class="gallery-item">
                <img src="uploads/<?php echo htmlspecialchars($foto['imagem']); ?>" alt="Foto <?php echo $foto['id']; ?>">
            </div>
        <?php endforeach; ?>
    </div>
    <?php include($linkParaHeader); ?>

</body>
</html>
