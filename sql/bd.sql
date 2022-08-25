CREATE TABLE usuario (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    senha VARCHAR(32) NOT NULL,
    PRIMARY KEY(id)
);

SELECT * FROM usuario;

INSERT INTO usuario (nome, email, senha) VALUES ('Carlos Eduardo', 'carlos@cesc.dev', 'amarelo01');
INSERT INTO usuario (nome, email, senha) VALUES ('Adenir Cescon', 'cesc@cesc.dev', 'amarelo02');
INSERT INTO usuario (nome, email, senha) VALUES ('Jose Almeida', 'jose@cesc.dev', 'amarelo01');
INSERT INTO usuario (nome, email, senha) VALUES ('Ana Clara', 'ana@cesc.dev', 'amarelo02');
INSERT INTO usuario (nome, email, senha) VALUES ('Josias Cardoso', 'Josias@cesc.dev', 'amarelo01');
INSERT INTO usuario (nome, email, senha) VALUES ('Mário Freitas', 'mario@cesc.dev', 'amarelo02');
INSERT INTO usuario (nome, email, senha) VALUES ('Joaquin Roberto', 'joq@cesc.dev', 'amarelo01');
INSERT INTO usuario (nome, email, senha) VALUES ('Mariona Rios', 'mari@cesc.dev', 'amarelo02');

SELECT id, nome FROM usuario WHERE nome LIKE '%gfhgh%'