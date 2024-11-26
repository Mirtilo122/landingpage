<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Notícia</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Adicionar Nova Notícia</h1>
        <form action="salvar-noticia.php" method="POST" enctype="multipart/form-data">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required><br>

            <label for="resumo">Resumo:</label>
            <textarea id="resumo" name="resumo" rows="3" required></textarea><br>

            <label for="conteudo">Conteúdo:</label>
            <textarea id="conteudo" name="conteudo" rows="10" required></textarea><br>

            <label for="modelo">Modelo:</label>
            <select id="modelo" name="modelo" required>
                <option value="1">Modelo 1</option>
                <option value="2">Modelo 2</option>
                <option value="3">Modelo 3</option>
            </select><br>

            <label for="imagem_principal">Imagem Principal:</label>
            <input type="file" id="imagem_principal" name="imagem_principal" accept="image/*"><br>

            <label for="imagem_secundaria">Imagem Secundária:</label>
            <input type="file" id="imagem_secundaria" name="imagem_secundaria" accept="image/*"><br>

            <label for="imagem_terciaria">Imagem Terciária:</label>
            <input type="file" id="imagem_terciaria" name="imagem_terciaria" accept="image/*"><br>

            <label for="imagens_auxiliares">Imagens Auxiliares (pode selecionar várias):</label>
            <input type="file" id="imagens_auxiliares" name="imagens_auxiliares[]" accept="image/*" multiple><br>

            <input type="submit" value="Salvar Notícia">
        </form>
    </div>
</body>
</html>
