<?php 

if (!defined('BASE_PATH')) {
    define('BASE_PATH', __DIR__ . '../');
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/');
}

include("protect.php");

$linkParaHeader = $_SERVER['DOCUMENT_ROOT'] . '/landingpages/partes_essenciais/header.php';  // Caminho absoluto



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Painel</title>
</head>
<body>
    Bem Vindo ao Painel, <?php echo $_SESSION['nome']; ?>

    <div class="admin-container">
        <main>
            <div class="card-container">
                <!-- Bloco Notícias -->
                <div class="card">
                    <h2>Notícias</h2>
                    <div class="actions">
                        <button class="action-btn" onclick="location.href='admin_noticia/nova-noticia'">Adicionar Nova Notícia</button>
                        <button class="action-btn">Editar Notícias</button>
                        <button class="action-btn">Excluir Notícias</button>
                    </div>
                </div>

                <!-- Bloco Eventos -->
                <div class="card">
                    <h2>Eventos</h2>
                    <div class="actions">
                        <button class="action-btn">Adicionar Novo Evento</button>
                        <button class="action-btn">Editar Eventos</button>
                        <button class="action-btn">Excluir Eventos</button>
                    </div>
                </div>

                <!-- Bloco Pesquisas Acadêmicas -->
                <div class="card">
                    <h2>Pesquisas Acadêmicas</h2>
                    <div class="actions">
                        <button class="action-btn">Adicionar Pesquisa</button>
                        <button class="action-btn">Editar Pesquisa</button>
                        <button class="action-btn">Excluir Pesquisa</button>
                    </div>
                </div>

                <!-- Bloco Documentos -->
                <div class="card">
                    <h2>Documentos</h2>
                    <div class="actions">
                        <button class="action-btn">Adicionar Documento</button>
                        <button class="action-btn">Editar Documento</button>
                        <button class="action-btn">Excluir Documento</button>
                    </div>
                </div>

                <!-- Bloco Galeria -->
                <div class="card">
                    <h2>Galeria</h2>
                    <div class="actions">
                        <button class="action-btn">Adicionar Imagem</button>
                        <button class="action-btn">Editar Imagens</button>
                        <button class="action-btn">Excluir Imagem</button>
                    </div>
                </div>

                <!-- Bloco Rodapé -->
                <div class="card">
                    <h2>Rodapé</h2>
                    <div class="actions">
                        <button class="action-btn">Editar Informações do Rodapé</button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <p>
        <a href="logout.php">Sair</a>
    </p>

    <?php include($linkParaHeader); ?>
</body>
</html>