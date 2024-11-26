<?php
require 'conexao.php';

$id = $_GET['id'];
$sql = "SELECT * FROM noticias WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$noticia = $stmt->fetch(PDO::FETCH_ASSOC);

$modelo = $noticia['modelo'];
$titulo = $noticia['titulo'];
$resumo = $noticia['resumo'];
$conteudo = $noticia['conteudo'];
$imagemPrincipal = $noticia['imagem_principal'];
$imagemSecundaria = $noticia['imagem_secundaria'];
$imagemTerciaria = $noticia['imagem_terciaria'];
$imagensAuxiliares = unserialize($noticia['imagens_auxiliares']);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notícias</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<?php
// Função para exibir imagem
function exibirImagem($imagem) {
    if ($imagem) {
        echo '<img src="data:image/jpeg;base64,' . base64_encode($imagem) . '" alt="Imagem da notícia">';
    }
}

// Verificar qual modelo usar
switch ($modelo) {
    case 1:
        include 'modelo1.php';
        break;
    case 2:
        include 'modelo2.php';
        break;
    case 3:
        include 'modelo3.php';
        break;
    default:
        echo "<p>Modelo não encontrado.</p>";
}
?>
</body>
</html>
