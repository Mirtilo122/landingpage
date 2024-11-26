CREATE TABLE noticias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    resumo TEXT NOT NULL,
    conteudo TEXT NOT NULL,
    modelo INT NOT NULL, -- Modelo da notícia (1, 2 ou 3)
    imagem_principal LONGBLOB, -- Armazena a imagem principal
    imagem_secundaria LONGBLOB, -- Armazena a imagem secundária
    imagem_terciaria LONGBLOB, -- Armazena a imagem terciária
    imagens_auxiliares JSON, -- Armazena as imagens auxiliares em formato JSON
    data_publicacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Data e hora da publicação
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(25) NOT NULL
)