<div class="noticia-modelo2">
    <h1><?php echo $titulo; ?></h1>
    <div class="quadro-compartilhar">
        <h3>Compartilhe essa notícia</h3>
        <button>Botão de Compartilhamento</button>
    </div>
    <?php exibirImagem($imagemPrincipal); ?>
    
    <p><?php echo $resumo; ?></p>
    
    <div class="conteudo-duas-colunas">
        <div class="coluna-esquerda">
            <h3>Imagens Auxiliares</h3>
            <?php
            foreach ($imagensAuxiliares as $imagem) {
                exibirImagem($imagem);
            }
            ?>
        </div>
        <div class="coluna-direita">
            <div class="conteudo">
                <p><?php echo nl2br($conteudo); ?></p>
            </div>
        </div>
    </div>
</div>
