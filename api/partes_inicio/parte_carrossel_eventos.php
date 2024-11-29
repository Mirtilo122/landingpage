<div class="titulos" id="eventos">
    <div class="titulo_destaque">
        <h1>EVENTOS</h1>
        <div class="barras_de_titulo">
            <div class="barra1"></div>
            <div class="barra2"></div>
        </div>
    </div>
    <div class="btn_ver_mais">
        <h1>Ver Mais</h1>
        <button type="button" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
            </svg>
        </button>
    </div>
</div>

<div class="carrossel_eventos">
    <div id="carouselExampleCaptions2" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <?php

            $linkParaUploadsEventos = BASE_URL . 'admin/admin_eventos/uploads';

            $sql = "SELECT id, titulo, descricao, imagem, link_inscricao, link_mais_informacoes FROM eventos";
            $stmt = $pdo->query($sql);
            $totalEventos = $stmt->rowCount();  // Contar o número de eventos
            $active = true; 
            $index = 0;

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<button type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="' . $index . '" class="' . ($active ? 'active' : '') . '" aria-current="true" aria-label="Slide ' . ($index + 1) . '"></button>';
                $active = false;  
                $index++;
            }
            ?>
        </div>
        <div class="carousel-inner">
            <?php
            
            $stmt->execute();
            $active = true;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="carousel-item ' . ($active ? 'active' : '') . '">';
                echo '<div class="imagem_evento" style="background: no-repeat url(\'' . $linkParaUploadsEventos . '/' . htmlspecialchars($row['imagem']) . '\');">';
                echo '<div class="overlay"></div>';
                echo '<div class="texto_bloco_evento">';
                echo '<h5>' . htmlspecialchars($row['titulo']) . '</h5>';
                echo '<p>' . htmlspecialchars($row['descricao']) . '</p>';
                echo '</div>';
                echo '<div class="encaminhamentos">';
                echo '<div class="botao_saiba_mais"><a href="' . htmlspecialchars($row['link_mais_informacoes']) . '"><p>Saiba Mais</p></a></div>';
                echo '<div class="botao_inscricao"><a href="' . htmlspecialchars($row['link_inscricao']) . '"><p>Inscreva-se</p></a></div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                $active = false;
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>      
</div>
