<?php

if (!defined('BASE_PATH')) {
    define('BASE_PATH', __DIR__ . '../../');
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/');
}

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'conexao.php';


$titulo = $_POST['titulo'];
$resumo = $_POST['resumo'];
$conteudo = $_POST['conteudo'];
$modelo = $_POST['modelo'];

// Função para processar imagens
function processarImagem($imagem) {
    if ($imagem['error'] == 0) {
        return file_get_contents($imagem['tmp_name']);
    }
    return null;
}

$imagemPrincipal = processarImagem($_FILES['imagem_principal']);
$imagemSecundaria = processarImagem($_FILES['imagem_secundaria']);
$imagemTerciaria = processarImagem($_FILES['imagem_terciaria']);

// Processar imagens auxiliares
$imagensAuxiliares = [];
if (isset($_FILES['imagens_auxiliares'])) {
    foreach ($_FILES['imagens_auxiliares']['tmp_name'] as $key => $tmp_name) {
        if ($_FILES['imagens_auxiliares']['error'][$key] == 0) {
            $imagensAuxiliares[] = file_get_contents($tmp_name);
        }
    }
}
$imagensAuxiliaresSerializadas = serialize($imagensAuxiliares);

// Inserir dados no banco de dados
$sql = "INSERT INTO noticias (titulo, resumo, conteudo, modelo, imagem_principal, imagem_secundaria, imagem_terciaria, imagens_auxiliares) 
        VALUES (:titulo, :resumo, :conteudo, :modelo, :imagem_principal, :imagem_secundaria, :imagem_terciaria, :imagens_auxiliares)";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':titulo', $titulo);
$stmt->bindParam(':resumo', $resumo);
$stmt->bindParam(':conteudo', $conteudo);
$stmt->bindParam(':modelo', $modelo);
$stmt->bindParam(':imagem_principal', $imagemPrincipal, PDO::PARAM_LOB);
$stmt->bindParam(':imagem_secundaria', $imagemSecundaria, PDO::PARAM_LOB);
$stmt->bindParam(':imagem_terciaria', $imagemTerciaria, PDO::PARAM_LOB);
$stmt->bindParam(':imagens_auxiliares', $imagensAuxiliaresSerializadas, PDO::PARAM_LOB);

$stmt->execute();

header('Location: lista-noticias.php');
?>
