<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__ . '/../../') . '/'); 
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/'); 
}

require_once BASE_PATH . 'conexao.php';

$query = "SELECT id, nome, root, data, visivel FROM documentos ORDER BY data DESC";
$stmt = $pdo->query($query);
$documentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Atualizar a visibilidade do documento
if (isset($_POST['toggle_visivel'])) {
    $id = $_POST['id'];
    $visivel = $_POST['visivel'] ? 0 : 1;  // Toggle de visibilidade

    $updateQuery = "UPDATE documentos SET visivel = :visivel WHERE id = :id";
    $updateStmt = $pdo->prepare($updateQuery);
    $updateStmt->execute([':visivel' => $visivel, ':id' => $id]);
    header("Location: gerenciar_documentacao.php"); // Recarregar a página
}

// Excluir documento
if (isset($_GET['excluir_id'])) {
    $id = $_GET['excluir_id'];
    
    // Obter o caminho do arquivo antes de excluir
    $query = "SELECT root FROM documentos WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);
    $documento = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($documento) {
        // Excluir o arquivo
        unlink($documento['root']);
        
        // Excluir do banco
        $deleteQuery = "DELETE FROM documentos WHERE id = :id";
        $deleteStmt = $pdo->prepare($deleteQuery);
        $deleteStmt->execute([':id' => $id]);
    }
    header("Location: gerenciar_documentacao.php"); // Recarregar a página
}

$linkParaHeader = $_SERVER['DOCUMENT_ROOT'] . '/landingpages/admin/header_admin.php';
$linkParaCss = "../css/main.css";


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Documentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $linkParaCss; ?>">

</head>
<body>
<div class="espacodaheaderkkkkkkk"></div>
<div class="espacodaheaderkkkkkkk"></div>

<div class="container mt-4">
    <h1>Gerenciar Documentos</h1>
    <a href="adicionar_documento.php" class="btn btn-primary mb-3">Adicionar Novo Documento</a>

    <div class="list-group">
        <?php foreach ($documentos as $documento): ?>
            <div class="list-group-item">
                <h5><?php echo htmlspecialchars($documento['nome']); ?></h5>
                <p>Data: <?php echo date("d/m/Y H:i:s", strtotime($documento['data'])); ?></p>
                
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $documento['id']; ?>">
                    <input type="hidden" name="visivel" value="<?php echo $documento['visivel']; ?>">
                    <button type="submit" name="toggle_visivel" class="btn btn-<?php echo $documento['visivel'] ? 'success' : 'danger'; ?> btn-sm">
                        <?php echo $documento['visivel'] ? 'Visível' : 'Ocultar'; ?>
                    </button>
                </form>

                <a href="gerenciar_documentacao.php?excluir_id=<?php echo $documento['id']; ?>" class="btn btn-danger btn-sm ml-2">Excluir</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
    
    <?php include($linkParaHeader); ?>
</body>
</html>