<div class="noticia-modelo3">
    <h1><?php echo $titulo; ?></h1>
    <div class="quadro-compartilhar">
        <h3>Compartilhe essa notícia</h3>
        <button>Botão de Compartilhamento</button>
    </div>
    
    <p><?php echo $resumo; ?></p>
    
    <div class="conteudo">
        <?php
        // Substituir as tags do texto pelo conteúdo correspondente
        $conteudoFormatado = str_replace(
            ['<tag de inclusão de imagem principal>', '<tag de inclusão de imagem secundária>', '<tag de inclusão de imagem terciária>'],
            [
                '<div class="imagem-incorporada">' . exibirImagem($imagemPrincipal) . '</div>',
                '<div class="imagem-incorporada">' . exibirImagem($imagemSecundaria) . '</div>',
                '<div class="imagem-incorporada">' . exibirImagem($imagemTerciaria) . '</div>'
            ],
            nl2br($conteudo)
        );
        echo $conteudoFormatado;
        ?>
    </div>

    <div class="imagens-auxiliares">
        <h3>Imagens Auxiliares</h3>
        <?php
        foreach ($imagensAuxiliares as $imagem) {
            exibirImagem($imagem);
        }
        ?>
    </div>
</div>
