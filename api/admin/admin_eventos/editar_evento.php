<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__ . '/../..') . '/'); 
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/'); 
}

require_once BASE_PATH . 'conexao.php';

// Verificar se o evento foi encontrado
if (isset($_GET['id'])) {
    $evento_id = $_GET['id'];

    // Consultar o evento no banco de dados
    $sql = "SELECT * FROM eventos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $evento_id);
    $stmt->execute();
    $evento = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$evento) {
        echo "Evento não encontrado.";
        exit;
    }

    // Verificar se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Captura dos dados do formulário
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $link_inscricao = $_POST['link_inscricao'];
        $link_mais_informacoes = $_POST['link_mais_informacoes'];
        $data_exclusao = $_POST['data_exclusao'];
        $imagem_nome = $evento['imagem']; // Manter a imagem existente

        // Se uma nova imagem foi carregada
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
            $imagem = $_FILES['imagem'];
            $imagem_nome = uniqid() . '-' . $imagem['name'];
            $imagem_destino = 'uploads/' . $imagem_nome;

            // Verificar se a imagem foi carregada corretamente
            if (move_uploaded_file($imagem['tmp_name'], $imagem_destino)) {
                // Apagar a imagem antiga se houver
                if (file_exists('uploads/' . $evento['imagem'])) {
                    unlink('uploads/' . $evento['imagem']);
                }
            } else {
                echo "Erro ao fazer upload da nova imagem.";
            }
        }

        // Atualizar o evento no banco de dados
        $sql_update = "UPDATE eventos SET 
                        titulo = :titulo,
                        descricao = :descricao,
                        imagem = :imagem,
                        link_inscricao = :link_inscricao,
                        link_mais_informacoes = :link_mais_informacoes,
                        data_exclusao = :data_exclusao
                    WHERE id = :id";
        $stmt_update = $pdo->prepare($sql_update);
        $stmt_update->bindParam(':titulo', $titulo);
        $stmt_update->bindParam(':descricao', $descricao);
        $stmt_update->bindParam(':imagem', $imagem_nome);
        $stmt_update->bindParam(':link_inscricao', $link_inscricao);
        $stmt_update->bindParam(':link_mais_informacoes', $link_mais_informacoes);
        $stmt_update->bindParam(':data_exclusao', $data_exclusao);
        $stmt_update->bindParam(':id', $evento_id);
        $stmt_update->execute();

        // Redirecionar para a página de gerenciamento de eventos após o sucesso
        header('Location: gerenciar_eventos.php');
        exit;
    }
} else {
    echo "ID do evento não fornecido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Evento</h2>
        <form action="editar_evento.php?id=<?php echo $evento['id']; ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo htmlspecialchars($evento['titulo']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control" rows="3" required><?php echo htmlspecialchars($evento['descricao']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="link_inscricao" class="form-label">Link para Inscrição</label>
                <input type="url" name="link_inscricao" id="link_inscricao" class="form-control" value="<?php echo htmlspecialchars($evento['link_inscricao']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="link_mais_informacoes" class="form-label">Link para Mais Informações</label>
                <input type="url" name="link_mais_informacoes" id="link_mais_informacoes" class="form-control" value="<?php echo htmlspecialchars($evento['link_mais_informacoes']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="data_exclusao" class="form-label">Data de Exclusão</label>
                <input type="date" name="data_exclusao" id="data_exclusao" class="form-control" value="<?php echo $evento['data_exclusao']; ?>">
            </div>
            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem Atual</label>
                <div>
                    <img src="uploads/<?php echo htmlspecialchars($evento['imagem']); ?>" alt="Imagem do Evento" style="max-width: 200px; max-height: 200px;">
                </div>
                <label for="imagem" class="form-label">Nova Imagem (opcional)</label>
                <input type="file" name="imagem" id="imagem" class="form-control" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0L6ZbPp6NzYUpFNSzvc5sdAqjx7yT0FGQokz2Wj+1DO3nUGY" crossorigin="anonymous"></script>
</body>
</html>
