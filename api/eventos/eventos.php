<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__ . '/..') . '/'); 
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/'); 
}

require_once BASE_PATH . 'conexao.php';


$sql = "SELECT id, titulo, imagem, descricao, link_inscricao, link_mais_informacoes FROM eventos WHERE data_exclusao > NOW() ORDER BY data_criacao DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização de Eventos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <div class="espacodaheaderkkkkkkk"></div>
        <div class="titulos" id="pesquisas">
            <div class="titulo_destaque">
                <h1>EVENTOS</h1>
                <div class="barras_de_titulo">
                    <div class="barra1"></div>
                    <div class="barra2"></div>
                </div>
            </div>
        </div>

<div class="container mt-5">
    <h1>Eventos</h1>
    <div class="row" style="min-height: 100vh;">
        <?php foreach ($eventos as $evento): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="imagem_evento" style="background: no-repeat center center; background-size: cover; height: 200px; background-image: url('<?php echo BASE_URL . "admin/admin_eventos/uploads/" . htmlspecialchars($evento['imagem']); ?>');">
                        <div class="overlay"></div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($evento['titulo']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($evento['descricao']) ?></p>
                        <a href="<?= htmlspecialchars($evento['link_mais_informacoes']) ?>" class="btn btn-info">Saiba Mais</a>
                        <a href="<?= htmlspecialchars($evento['link_inscricao']) ?>" class="btn btn-primary">Inscreva-se</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include '../partes_essenciais/footer.php'; ?>

<?php include '../partes_essenciais/header.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kaes29h8U2DFAsu3Axa5KNj03hzlj6Wj5fuZYZOqt3tdlx5eFZreJlXhW2Y4D7h8O" crossorigin="anonymous"></script>
</body>
</html>
