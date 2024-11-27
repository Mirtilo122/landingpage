<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__ . '/../../') . '/'); 
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/'); 
}

$linkParaHeader = $_SERVER['DOCUMENT_ROOT'] . '/landingpages/admin/header_admin.php';
$linkParaCss = "../css/main.css";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Notícia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>

<div class="espacodaheaderkkkkkkk"></div>

    <div class="container">
        <h1>Adicionar Nova Notícia</h1>
        <form id="noticia-form" action="salvar-noticia.php" method="POST" enctype="multipart/form-data">
            <label for="modelo">Modelo:</label>
            <select id="modelo" name="modelo" required>
                <option value="">Selecione um modelo</option>
                <option value="1">Modelo 1</option>
                <option value="2">Modelo 2</option>
                <option value="3">Modelo 3</option>
            </select><br>

            <div id="campos-adicionais" class="hidden">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required><br>

                <label for="resumo">Resumo:</label>
                <textarea id="resumo" name="resumo" rows="3" required></textarea><br>

                <label for="conteudo">Conteúdo:</label>
                <textarea id="conteudo" name="conteudo" rows="10" required></textarea><br>

                <label for="imagem_principal">Imagem Principal:</label>
                <input type="file" id="imagem_principal" name="imagem_principal" accept="image/*"><br>

                <label for="imagens_auxiliares">Imagens Auxiliares (pode selecionar várias):</label>
                <input type="file" id="imagens_auxiliares" name="imagens_auxiliares[]" accept="image/*" multiple><br>

                <input type="submit" value="Salvar Notícia">
            </div>
            <div id="desenvolvimento" class="hidden">
                <img src="images.png" alt="Em Desenvolvimento">
            </div>
        </form>
    </div>

    <?php include($linkParaHeader); ?>

    <script>
        // Selecionar o dropdown e os campos adicionais
        const modeloSelect = document.getElementById('modelo');
        const camposAdicionais = document.getElementById('campos-adicionais');

        // Adicionar evento ao selecionar um modelo
        modeloSelect.addEventListener('change', function () {
            const valorModelo = modeloSelect.value;

            // Mostrar campos adicionais apenas para Modelo 1 e 2
            if (valorModelo === '1' || valorModelo === '2') {
                camposAdicionais.classList.remove('hidden');
            } else {
                camposAdicionais.classList.add('hidden');

            }

            if (valorModelo === '3') {
                desenvolvimento.classList.remove('hidden');
            } else {
                desenvolvimento.classList.add('hidden');

            }
        });
    </script>
</body>
</html>
