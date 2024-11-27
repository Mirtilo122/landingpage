<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__ . '/../../') . '/'); 
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/'); 
}

require_once BASE_PATH . 'conexao.php';



include BASE_PATH . 'partes_essenciais/config.php';

$linkParaHeader = BASE_PATH . 'admin/header_admin.php';
$linkParaCss = "../css/main.css";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Rodapé</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $linkParaCss; ?>">
    <style>
       
       h1 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }
        form {
            width: 60%;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        form div {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        textarea {
            height: 100px;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .footer-list {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .footer-item {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            position: relative;
        }
        .footer-item:last-child {
            border-bottom: none;
        }
        .footer-item button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #dc3545;
        }
        .footer-item button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
<div class="espacodaheaderkkkkkkk"></div>
<div class="espacodaheaderkkkkkkk"></div>
<?php include ($linkParaHeader); ?>
    <div class="container">
        <h1>Editar Informações do Rodapé</h1>
        <form action="visualizar.php" method="POST">
            <div>
                <label for="Contato">Contato:</label>
                <input type="text" id="Contato" name="Contato" value="<?php echo $config['Contato']; ?>" readonly>
                <button type="button" onclick="habilitarEdicao('Contato')">Editar</button>
            </div>
            <div>
                <label for="facebook">Facebook:</label>
                <input type="text" id="facebook" name="facebook" value="<?php echo $config['facebook']; ?>" readonly>
                <button type="button" onclick="habilitarEdicao('facebook')">Editar</button>
            </div>
            <div>
                <label for="linkedin">LinkedIn:</label>
                <input type="text" id="linkedin" name="linkedin" value="<?php echo $config['linkedin']; ?>" readonly>
                <button type="button" onclick="habilitarEdicao('linkedin')">Editar</button>
            </div>
            <div>
                <label for="instagram">Instagram:</label>
                <input type="text" id="instagram" name="instagram" value="<?php echo $config['instagram']; ?>" readonly>
                <button type="button" onclick="habilitarEdicao('instagram')">Editar</button>
            </div>
            <div>
                <label for="youTube">YouTube:</label>
                <input type="text" id="youTube" name="youTube" value="<?php echo $config['youTube']; ?>" readonly>
                <button type="button" onclick="habilitarEdicao('youTube')">Editar</button>
            </div>
            <div>
                <label for="Texto">Texto:</label>
                <textarea id="Texto" name="Texto" readonly><?php echo $config['Texto']; ?></textarea>
                <button type="button" onclick="habilitarEdicao('Texto')">Editar</button>
            </div>
            <button type="submit">Salvar e Pré-Visualizar</button>
        </form>
    </div>

    
    

    <script>
        function habilitarEdicao(id) {
            document.getElementById(id).removeAttribute('readonly');
        }
    </script>
</body>
</html>
