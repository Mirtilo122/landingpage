<?php

$linkParaNews = BASE_URL . 'noticias/noticias.php';

?>

<div class="titulos" id="news">
    <div class="titulo_destaque">
        <h1>NOTICIAS</h1>
        <div class="barras_de_titulo">
            <div class="barra1"></div>
            <div class="barra2"></div>
        </div>
    </div>
    <div class="btn_ver_mais">
        <h1>Ver Mais</h1>
        <button type="button" class="btn btn-primary" onclick="<?php echo $linkParaNews; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
            </svg>
        </button>
    </div>
</div>

<div class="carrossel_noticias">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <div class="imagem_noticia" style="background: no-repeat url(imagens/machupichu.jpg);">
                    <div class="bloco_noticia">
                        <div class="barra_colorida_bloco_noticia"></div>
                        <div class="texto_bloco_noticia">
                            <h5>A cidade na Montanha</h5>
                            <p>"Águias voam, as torretas giram e parecem desprezar o céu;
                            Elas se voltam aos muros que agora desmoronam em ruínas,
                            E tiram de seu descanso tranquilo suas fadadas presas."
                            - Samuel Prout Hill</p>
                        </div>                        
                    </div>
                </div>
                </div>
                <div class="carousel-item">
                <div class="imagem_noticia" style="background: no-repeat url(imagens/chichen_itza.jpg);">
                    <div class="bloco_noticia">
                        <div class="barra_colorida_bloco_noticia"></div>
                        <div class="texto_bloco_noticia">
                            <h5>Ruínas Maias</h5>
                            <p>"O Grande Campo de Jogo também era muito impressionante. Eu gostaria de ter visto os jogadores em ação, embora pareça que os finais eram bem violentos. Acho que era mais seguro ser um espectador."
                                – IslaDeb</p>
                        </div>
                    </div>
                </div>
                </div>

                <div class="carousel-item">
                <div class="imagem_noticia" style="background: no-repeat url(imagens/petra.jpg);">
                    <div class="bloco_noticia">
                        <div class="barra_colorida_bloco_noticia"></div>
                        <div class="texto_bloco_noticia">
                            <h5>Esculpida em pedra?</h5>
                            <p>"Petra é um exemplo perfeito da capacidade que a humanidade tem de transformar uma rocha árida em algo esplendoroso."
                                – Edward Dawson</p>
                        </div>
                    </div>
                </div>
                </div>
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
