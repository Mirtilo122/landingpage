<?php

if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__ . '/../../') . '/'); 
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/'); 
}

require_once BASE_PATH . 'conexao.php';


$linkParaHeader = $_SERVER['DOCUMENT_ROOT'] . '/landingpages/admin/header_admin.php';
$linkParaCss = "../css/main.css";


$configPath = BASE_PATH . 'partes_essenciais/config.php';
if (file_exists($configPath)) {
    include $configPath;
} else {
    $linkMentor = '';
    $linkComercial = '';
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $linkParaCss; ?>">
    <style>
        .input-field {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }
        .edit-btn {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
            margin-left: 10px;
        }
    </style>
</head>
<body>
<div class="espacodaheaderkkkkkkk"></div>
<div class="espacodaheaderkkkkkkk"></div>
    <h1>Configurações</h1>
    <form id="configForm" method="POST" action="salvar_configuracoes.php">
        <div>
            <label for="linkMentor">Link Mentor:</label>
            <input 
                type="text" 
                id="linkMentor" 
                name="linkMentor" 
                class="input-field" 
                value="<?php echo htmlspecialchars($linkMentor ?? '', ENT_QUOTES); ?>" 
                readonly
            >
            <span class="edit-btn" onclick="toggleEdit('linkMentor')">Editar</span>
        </div>
        <div>
            <label for="linkComercial">Link Comercial:</label>
            <input 
                type="text" 
                id="linkComercial" 
                name="linkComercial" 
                class="input-field" 
                value="<?php echo htmlspecialchars($linkComercial ?? '', ENT_QUOTES); ?>" 
                readonly
            >
            <span class="edit-btn" onclick="toggleEdit('linkComercial')">Editar</span>
        </div>
        <button type="submit">Salvar</button>
    </form>

    <script>
        function toggleEdit(fieldId) {
            const input = document.getElementById(fieldId);
            input.readOnly = !input.readOnly; 
            if (!input.readOnly) {
                input.focus(); 
            }
        }
    </script>
    
    <?php include($linkParaHeader); ?>
</body>
</html>
