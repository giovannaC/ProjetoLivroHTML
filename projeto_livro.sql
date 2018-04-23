CREATE TABLE autor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    created DATETIME,
    modified DATETIME
);

CREATE TABLE livro (
    id INT AUTO_INCREMENT PRIMARY KEY,
    autor_id INT NOT NULL,
    titulo VARCHAR(50),
    descricao VARCHAR(255),
    quantidade INT NOT NULL,
    isbn VARCHAR(11),
    created DATETIME,
    modified DATETIME,
    FOREIGN KEY autor_key (autor_id) REFERENCES autor(id)
);

CREATE TABLE genero (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(255),
    created DATETIME,
    modified DATETIME,
    UNIQUE KEY (descricao)
);

CREATE TABLE livro_genero (
    livro_id INT NOT NULL,
    genero_id INT NOT NULL,
    PRIMARY KEY (livro_id, genero_id),
    FOREIGN KEY genero_key (genero_id) REFERENCES genero(id),
    FOREIGN KEY livro_key (livro_id) REFERENCES livro(id)
);

CREATE TABLE locado (
    livro_id INT NOT NULL,
    quantidade_dispo INT,
    PRIMARY KEY (livro_id),
    FOREIGN KEY (livro_id) REFERENCES livro(id)
);