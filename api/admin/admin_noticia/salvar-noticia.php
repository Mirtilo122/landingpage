<?php

if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__ . '/../../') . '/'); 
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/'); 
}

require_once BASE_PATH . 'conexao.php';

function processarImagem($imagem) {
    if (isset($imagem) && $imagem['error'] == 0) {
        return file_get_contents($imagem['tmp_name']);
    }
    return null;
}

$titulo = $_POST['titulo'];
$resumo = $_POST['resumo'];
$conteudo = $_POST['conteudo'];
$modelo = $_POST['modelo'];





$imagemPrincipal = processarImagem($_FILES['imagem_principal']);

$imagemSecundaria = isset($_FILES['imagem_secundaria']) ? processarImagem($_FILES['imagem_secundaria']) : null;

$imagemTerciaria = isset($_FILES['imagem_terciaria']) ? processarImagem($_FILES['imagem_terciaria']) : null;

$imagensAuxiliares = [];
if (isset($_FILES['imagens_auxiliares']) && count($_FILES['imagens_auxiliares']['tmp_name']) > 0) {
    foreach ($_FILES['imagens_auxiliares']['tmp_name'] as $key => $tmp_name) {
        if ($_FILES['imagens_auxiliares']['error'][$key] == 0) {
            $imagensAuxiliares[] = file_get_contents($tmp_name);
        }
    }
}
$imagensAuxiliaresSerializadas = !empty($imagensAuxiliares) ? serialize($imagensAuxiliares) : null;


$destaque = isset($_POST['destaque']) ? 1 : 0;

$sql = "INSERT INTO noticias (titulo, resumo, conteudo, modelo, imagem_principal, imagem_secundaria, imagem_terciaria, imagens_auxiliares, destaque) 
        VALUES (:titulo, :resumo, :conteudo, :modelo, :imagem_principal, :imagem_secundaria, :imagem_terciaria, :imagens_auxiliares, :destaque)";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':titulo', $titulo);
$stmt->bindParam(':resumo', $resumo);
$stmt->bindParam(':conteudo', $conteudo);
$stmt->bindParam(':modelo', $modelo);
$stmt->bindParam(':imagem_principal', $imagemPrincipal, PDO::PARAM_LOB);
$stmt->bindParam(':imagem_secundaria', $imagemSecundaria, PDO::PARAM_LOB);
$stmt->bindParam(':imagem_terciaria', $imagemTerciaria, PDO::PARAM_LOB);
$stmt->bindParam(':imagens_auxiliares', $imagensAuxiliaresSerializadas, PDO::PARAM_LOB);
$stmt->bindParam(':destaque', $destaque);

$stmt->execute();




header('Location: gerenciar_noticias.php');
?>
