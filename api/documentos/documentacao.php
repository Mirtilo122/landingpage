<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__ . '/..') . '/'); 
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/'); 
}

require_once BASE_PATH . 'conexao.php';

$linkDocumentos = BASE_PATH . 'admin/admin_documentos/';

// Consultar os documentos visíveis
$query = "SELECT id, nome, root, data FROM documentos WHERE visivel = 1 ORDER BY data DESC";
$stmt = $pdo->query($query);
$documentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="imagens/fav.png" type="image/png">
    <title>Layout Padrão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/main.css">
    <script src="js/script.js"></script>
</head>
<body>
    
    <main>
        <div class="espacodaheaderkkkkkkk"></div>
        <div class="titulos" id="pesquisas">
            <div class="titulo_destaque">
                <h1>DOCUMENTOS</h1>
                <div class="barras_de_titulo">
                    <div class="barra1"></div>
                    <div class="barra2"></div>
                </div>
            </div>
        </div>
        <div class="container mt-4">
    <h1>Documentos Disponíveis</h1>

    <?php if (empty($documentos)): ?>
        <div class="alert alert-warning">
            Não há documentos disponíveis no momento.
        </div>
    <?php else: ?>
        <div class="list-group">
            <?php foreach ($documentos as $documento): ?>
                <div class="list-group-item">
                    <h5><?php echo htmlspecialchars($documento['nome']); ?></h5>
                    <p>Data: <?php echo date("d/m/Y H:i:s", strtotime($documento['data'])); ?></p>
                    <a href="<?php echo $linkDocumentos . $documento['root']; ?>" class="btn btn-primary" target="_blank">Visualizar Documento</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
    </main>


</body>
</html>


    <?php include '../partes_essenciais/footer.php'; ?>

    <?php include '../partes_essenciais/header.php'; ?>

</body>
</html>