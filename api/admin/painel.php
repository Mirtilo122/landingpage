<?php 

if (!defined('BASE_PATH')) {
    define('BASE_PATH', __DIR__ . '../');
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/');
}

$linkParaHeader = $_SERVER['DOCUMENT_ROOT'] . '/landingpages/admin/header_admin.php';

include("protect.php");

if (!isset($_SESSION)) {
    session_start(); // Inicia a sessão, caso ainda não tenha sido iniciada
}

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}




?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <title>Painel</title>
</head>
<body>
    
    
<div class="espacodaheaderkkkkkkk"></div>
    <div class="admin-container">
        <main>
            <div class="card-container">

                <!-- Bloco Notícias -->
                <div class="card">
                    <div class="card_title">
                        <h2>Gerenciador de Notícias</h2>
                    </div>
                    <div class="actions">
                        <button class="action-btn" onclick="location.href='admin_noticia/nova-noticia'">Adicionar Nova Notícia</button>
                        <button class="action-btn" onclick="location.href='admin_noticia/gerenciar_noticias.php'">Editar Notícias</button>
                    </div>
                </div>

                <!-- Bloco Eventos -->
                <div class="card">
                    <div class="card_title">
                        <h2>Gerenciador de Eventos</h2>
                    </div>
                    
                    <div class="actions">
                        <button class="action-btn" onclick="location.href='admin_evemtos/gerenciar_eventos.php'">Acessar</button>
                    </div>
                </div>

                <!-- Bloco Pesquisas Acadêmicas -->
                <div class="card">
                    <div class="card_title">
                        <h2>Gerenciador de Pesquisas Acadêmicas</h2>
                    </div>
                
                    <div class="actions">
                        <button class="action-btn">Adicionar Nova Pesquisa</button>
                        <button class="action-btn">Editar Pesquisas</button>
                    </div>
                </div>

                <!-- Bloco Documentos -->
                <div class="card">
                    <div class="card_title">
                        <h2>Gerenciador de Documentos</h2>
                    </div>
                    
                    <div class="actions">
                        <button class="action-btn">Adicionar Documentos</button>
                        <button class="action-btn">Editar Documentos</button>
                    </div>
                </div>

                <!-- Bloco Galeria -->
                <div class="card">
                    <div class="card_title">
                        <h2>Gerenciador de Galeria</h2>
                    </div>
                    
                    <div class="actions">
                        <button class="action-btn" onclick="location.href='admin_galeria/gerenciar_fotos'">Adicionar Imagem</button>
                        <button class="action-btn">Gerenciar Imagens</button>
                    </div>
                </div>

                <!-- Adicionar Usuários Admin-->
                <div class="card">
                    <div class="card_title">
                        <h2>Gerenciar Usuários</h2>
                    </div>
                    
                    <div class="actions">
                        <button class="action-btn" onclick="location.href='admin_galeria/gerenciar_fotos'">Adicionar Usuário</button>
                        <button class="action-btn">Gerenciar Usuários</button>
                    </div>
                </div>


                <!-- Bloco Rodapé -->
                <div class="card">                    
                    <div class="card_title">
                        <h2>Informações do Rodapé</h2>
                    </div>
                    
                    <div class="actions">
                        <button class="action-btn">Editar Informações do Rodapé</button>
                    </div>
                </div>

                <!-- Outras Configurações -->
                <div class="card">
                    <div class="card_title">
                        <h2>Outras Configurações</h2>
                    </div>
                    <div class="actions">
                        <button class="action-btn">Acessar</button>
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