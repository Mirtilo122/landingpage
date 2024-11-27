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

ALTER TABLE noticias ADD destaque TINYINT(1) DEFAULT 0;


CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(25) NOT NULL
)

CREATE TABLE fotos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imagem VARCHAR(255) NOT NULL,
    data TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    visivel ENUM('sim', 'nao') DEFAULT 'sim'
);

CREATE TABLE documentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    root VARCHAR(255) NOT NULL,
    data DATETIME DEFAULT CURRENT_TIMESTAMP,
    visivel BOOLEAN DEFAULT 0
);


-- o arquivo de documentos da grade curricular do curso
INSERT INTO documentos (nome, root, data, visivel) 
VALUES ('Grade Curricular do Curso de ADS', 'uploads/674779bba9b059.93400561.pdf', '2024-11-27 16:57:47', 1);


