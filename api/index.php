<?php 

if (!defined('BASE_PATH')) {
    define('BASE_PATH', __DIR__ . '/');
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/');
}

require_once BASE_PATH . 'conexao.php';

$sql = "DELETE FROM eventos WHERE data_exclusao IS NOT NULL AND data_exclusao < NOW()";
$stmt = $pdo->prepare($sql);
$stmt->execute();


$sql = "SELECT * FROM noticias WHERE destaque = 1 ORDER BY id DESC LIMIT 3";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$noticiasDestacadas = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM noticias WHERE destaque = 0 ORDER BY id DESC LIMIT 3";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$ultimasNoticias = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM eventos ORDER BY id DESC LIMIT 3";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$eventosDisponiveis = $stmt->fetchAll(PDO::FETCH_ASSOC);

$linkParaUploadsEventos = BASE_PATH . 'admin/admin_eventos/uploads';


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    
</head>
<body>
    <main>
        <div class="espacodaheaderkkkkkkk"></div>

        <?php include 'partes_inicio/cabecalho_inicio.php'; ?> 

        <?php include 'partes_inicio/parte_hero.php'; ?>

        <?php include 'partes_inicio/parte_video.php'; ?>

        <?php // include 'partes_inicio/parte_cta.php'; ?>
        
        <?php
            if (count($noticiasDestacadas) > 0) {
                include 'partes_inicio/parte_carrossel_noticias.php';
                ?><div class="espacodaheaderkkkkkkk"></div> <?php
            }

            
            if (count($ultimasNoticias) > 2) {
                include 'partes_inicio/parte_noticias.php';
            }
            ?>

        
       <?php
            if (count($eventosDisponiveis) > 0) {
                include 'partes_inicio/parte_carrossel_eventos.php';
            } ?>

        <?php include 'partes_inicio/parte_pesquisa.php'; ?>

        <?php include 'partes_inicio/parte_promocao.php'; ?>
    </main>

    <?php include 'partes_essenciais/footer.php'; ?>

    <?php include 'partes_essenciais/header.php'; ?>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="Javascript/script.js"></script>
</body>