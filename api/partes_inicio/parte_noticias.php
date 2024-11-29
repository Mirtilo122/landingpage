<?php

if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__ . '/..') . '/'); 
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/'); 
}

require_once BASE_PATH . 'conexao.php';

$sql = "SELECT * FROM noticias WHERE destaque = 0 ORDER BY id DESC LIMIT 3";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$ultimasNoticias = $stmt->fetchAll(PDO::FETCH_ASSOC);


$linkParaNews = BASE_URL . 'noticias/noticias.php';

if (count($ultimasNoticias) > 0) {
    ?> <div class="noticias_cards">
    <?php
     foreach ($ultimasNoticias as $noticia) {
        $imagem = !empty($noticia['imagem_principal']) ? "data:image/jpeg;base64," . base64_encode($noticia['imagem_principal']) : 'imagens/default.jpg';
        $titulo = htmlspecialchars($noticia['titulo']);
        $resumo = htmlspecialchars($noticia['resumo']);
        ?>
        
        <div class="bloco_ultimas_noticias">
            <div class="imagem_bloco_ultimas_noticias">
                <img src="<?php echo $imagem; ?>" alt="<?php echo $titulo; ?>">
            </div>
            <div class="texto_bloco_ultimas_noticias">
                <a href="<?php echo $linkParaNews; ?>">
                    <h5><?php echo $titulo; ?></h5>
                </a>
                <p><?php echo $resumo; ?></p>
            </div>
        </div>
        <?php
    }
    ?>
    </div>
    <?php
}
?>
