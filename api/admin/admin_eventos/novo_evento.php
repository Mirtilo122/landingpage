<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__ . '/../..') . '/'); 
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/'); 
}

require_once BASE_PATH . 'conexao.php';

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura dos dados do formulário
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $link_inscricao = $_POST['link_inscricao'];
    $link_mais_informacoes = $_POST['link_mais_informacoes'];
    $data_exclusao = $_POST['data_exclusao'];

    // Upload da imagem
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
        $imagem = $_FILES['imagem'];
        $imagem_nome = uniqid() . '-' . $imagem['name'];
        $imagem_destino = 'uploads/' . $imagem_nome;

        // Verificar se a imagem foi carregada corretamente
        if (move_uploaded_file($imagem['tmp_name'], $imagem_destino)) {
            // Inserir o novo evento no banco de dados
            $sql = "INSERT INTO eventos (titulo, descricao, imagem, link_inscricao, link_mais_informacoes, data_exclusao) 
                    VALUES (:titulo, :descricao, :imagem, :link_inscricao, :link_mais_informacoes, :data_exclusao)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':imagem', $imagem_nome);
            $stmt->bindParam(':link_inscricao', $link_inscricao);
            $stmt->bindParam(':link_mais_informacoes', $link_mais_informacoes);
            $stmt->bindParam(':data_exclusao', $data_exclusao);
            $stmt->execute();

            // Redirecionar para a página de gerenciamento de eventos após o sucesso
            header('Location: gerenciar_eventos.php');
            exit;
        } else {
            echo "Erro ao fazer upload da imagem.";
        }
    } else {
        echo "Imagem não foi carregada corretamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Novo Evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Criar Novo Evento</h2>
        <form action="novo_evento.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="link_inscricao" class="form-label">Link para Inscrição</label>
                <input type="url" name="link_inscricao" id="link_inscricao" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="link_mais_informacoes" class="form-label">Link para Mais Informações</label>
                <input type="url" name="link_mais_informacoes" id="link_mais_informacoes" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="data_exclusao" class="form-label">Data de Exclusão</label>
                <input type="date" name="data_exclusao" id="data_exclusao" class="form-control">
            </div>
            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem</label>
                <input type="file" name="imagem" id="imagem" class="form-control" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Criar Evento</button>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0L6ZbPp6NzYUpFNSzvc5sdAqjx7yT0FGQokz2Wj+1DO3nUGY" crossorigin="anonymous"></script>
</body>
</html>
