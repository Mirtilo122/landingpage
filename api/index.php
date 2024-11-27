<?php 

if (!defined('BASE_PATH')) {
    define('BASE_PATH', __DIR__ . '../');
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/');
}


// Exemplo simples para garantir que a configuração funciona


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

        <?php include 'partes_inicio/parte_cta.php'; ?>

        <?php include 'partes_inicio/parte_carrossel_noticias.php'; ?>

        <?php include 'partes_inicio/parte_noticias.php'; ?>
        
        <?php include 'partes_inicio/parte_carrossel_eventos.php'; ?>

        <?php include 'partes_inicio/parte_pesquisa.php'; ?>

        <?php include 'partes_inicio/parte_promocao.php'; ?>
    </main>

    <?php include 'partes_essenciais/footer.php'; ?>

    <?php include 'partes_essenciais/header.php'; ?>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="Javascript/script.js"></script>
</body>