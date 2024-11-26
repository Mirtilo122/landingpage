<div class="noticia-modelo1">
    <h1><?php echo $titulo; ?></h1>
    <p><?php echo $resumo; ?></p>
    <div class="quadro-compartilhar">
        <h3>Compartilhe essa notícia</h3>
        <button>Botão de Compartilhamento</button>
    </div>
    <?php exibirImagem($imagemPrincipal); ?>
    <div class="conteudo">
        <p><?php echo nl2br($conteudo); ?></p>
    </div>
    <div class="imagens-auxiliares">
        <?php
        foreach ($imagensAuxiliares as $imagem) {
            exibirImagem($imagem);
        }
        ?>
    </div>
</div>
