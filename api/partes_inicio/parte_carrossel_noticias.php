<?php

if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__ . '/..') . '/'); 
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/'); 
}

require_once BASE_PATH . 'conexao.php';

$linkParaNoticia = BASE_PATH . 'noticias/noticia.php';

$sql = "SELECT * FROM noticias WHERE destaque = 1 ORDER BY id DESC LIMIT 3";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$noticiasDestacadas = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($noticiasDestacadas) > 0) {
    // Exibir o carrossel
?>
    <div class="carrossel_noticias">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            <div class="carousel-inner">
                <?php
                foreach ($noticiasDestacadas as $index => $noticia) {
                    $imagem = !empty($noticia['imagem_principal']) ? "data:image/jpeg;base64," . base64_encode($noticia['imagem_principal']) : 'imagens/default.jpg';
                    $titulo = htmlspecialchars($noticia['titulo']);
                    $resumo = htmlspecialchars($noticia['resumo']);
                    ?>
                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                        <div class="imagem_noticia" style="background-image: url(<?php echo $imagem; ?>);">
                            <div class="bloco_noticia">
                                <div class="barra_colorida_bloco_noticia"></div>
                                <div class="texto_bloco_noticia">
                                    <h5><?php echo $titulo; ?></h5>
                                    <p><?php echo $resumo; ?></p>
                                </div>
                                <a style="z-index: 5;" href="<?php echo $linkParaNoticia . '?id=' . $noticia['id']; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z"/>
                                    <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
<?php } ?>

