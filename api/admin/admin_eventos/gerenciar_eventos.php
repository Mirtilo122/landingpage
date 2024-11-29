<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__ . '/../..') . '/'); 
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/'); 
}

require_once BASE_PATH . 'conexao.php';

// Consultar os eventos do banco de dados
$sql = "SELECT id, titulo, imagem, data_exclusao FROM eventos ORDER BY data_criacao DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Verificar se foi solicitado excluir um evento
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Preparar o SQL para excluir o evento
    $delete_sql = "DELETE FROM eventos WHERE id = :id";
    $delete_stmt = $pdo->prepare($delete_sql);
    $delete_stmt->bindParam(':id', $delete_id, PDO::PARAM_INT);
    $delete_stmt->execute();

    // Redirecionar de volta para a página de gerenciamento
    header('Location: gerenciar_eventos.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Eventos</title>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<div class="espacodaheaderkkkkkkk"></div>
<div class="espacodaheaderkkkkkkk"></div>
    <div class="container mt-5">
        <h2>Gerenciador de Eventos</h2>

        <!-- Botão para adicionar novos eventos -->
        <div class="mb-3">
            <a href="novo_evento.php" class="btn btn-primary">Adicionar Novo Evento</a>
        </div>

        <!-- Tabela de eventos -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Título</th>
                    <th>Data de Exclusão</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($eventos as $evento): ?>
                    <tr>
                        <!-- Exibindo a imagem reduzida do evento -->
                        <td><img src="uploads/<?= htmlspecialchars($evento['imagem']) ?>" alt="<?= htmlspecialchars($evento['titulo']) ?>" style="width: 50px; height: 50px;"></td>
                        <!-- Exibindo o título do evento -->
                        <td><?= htmlspecialchars($evento['titulo']) ?></td>
                        <!-- Exibindo a data de exclusão -->
                        <td><?= htmlspecialchars($evento['data_exclusao'] ?: 'Não definida') ?></td>
                        <td>
                            <!-- Botões de editar e excluir -->
                            <a href="editar_evento.php?id=<?= $evento['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <!-- Excluir evento -->
                            <a href="gerenciar_eventos.php?delete_id=<?= $evento['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este evento?');">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php include '../header_admin.php' ; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0L6ZbPp6NzYUpFNSzvc5sdAqjx7yT0FGQokz2Wj+1DO3nUGY" crossorigin="anonymous"></script>
</body>
</html>
