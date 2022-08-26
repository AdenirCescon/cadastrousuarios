CREATE TABLE user (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    pass VARCHAR(32) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO user (name, email, pass) VALUES ('Carlos Eduardo', 'carlos@cesc.dev', 'amarelo01');
INSERT INTO user (name, email, pass) VALUES ('Adenir Cescon', 'cesc@cesc.dev', 'amarelo02');
INSERT INTO user (name, email, pass) VALUES ('Jose Almeida', 'jose@cesc.dev', 'amarelo01');
INSERT INTO user (name, email, pass) VALUES ('Ana Clara', 'ana@cesc.dev', 'amarelo02');
INSERT INTO user (name, email, pass) VALUES ('Josias Cardoso', 'Josias@cesc.dev', 'amarelo01');
INSERT INTO user (name, email, pass) VALUES ('Mário Freitas', 'mario@cesc.dev', 'amarelo02');
INSERT INTO user (name, email, pass) VALUES ('Joaquin Roberto', 'joq@cesc.dev', 'amarelo01');
INSERT INTO user (name, email, pass) VALUES ('Mariona Rios', 'mari@cesc.dev', 'amarelo02');

SELECT * FROM user;
SELECT id, name FROM user WHERE name LIKE '%Jo%'