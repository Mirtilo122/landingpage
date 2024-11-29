<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__ . '/..') . '/'); 
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/'); 
}

require_once BASE_PATH . 'conexao.php';

// Obter todas as fotos, agrupadas por data (dia)
$sql = "SELECT id, imagem, visivel, DATE(data) AS data_foto 
        FROM fotos 
        WHERE visivel = 'sim'
        ORDER BY data DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$fotos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Agrupar as fotos por data
$fotosAgrupadas = [];
foreach ($fotos as $foto) {
    $data = $foto['data_foto'];
    if (!isset($fotosAgrupadas[$data])) {
        $fotosAgrupadas[$data] = [];
    }
    $fotosAgrupadas[$data][] = $foto;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Galeria de Fotos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<div class="espacodaheaderkkkkkkk"></div>
<div class="titulos" id="eventos">
    <div class="titulo_destaque">
        <h1>GALERIA DE FOTOS</h1>
        <div class="barras_de_titulo">
            <div class="barra1"></div>
            <div class="barra2"></div>
        </div>
    </div>
</div>
    <div class="container mt-5"  style="min-height: 100vh;">
        <?php foreach ($fotosAgrupadas as $data => $grupoFotos): ?>
            <h3 class="mt-4"><?php echo date('d/m/Y', strtotime($data)); ?></h3>
            <div class="row">
                <?php foreach ($grupoFotos as $foto): ?>
                    <div class="col-md-3 mb-3">
                        <img src="../admin/admin_galeria/uploads/<?php echo htmlspecialchars($foto['imagem']); ?>" alt="Foto <?php echo $foto['id']; ?>" class="img-fluid rounded">
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>        
    </div>
    <?php include '../partes_essenciais/footer.php' ; ?>
    <?php include '../partes_essenciais/header.php' ; ?>
</body>
</html>
