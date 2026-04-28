CREATE DATABASE tarefas;

-- Crie a tabela de usuários
CREATE TABLE usuarios (
    id SERIAL PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    senha VARCHAR(32) NOT NULL
);

CREATE TABLE tarefas (
    id SERIAL PRIMARY KEY,
    usuario_id INT REFERENCES usuarios(id),
    titulo VARCHAR(100) NOT NULL,
    descricao TEXT,
    status VARCHAR(20) DEFAULT 'pendente',
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO usuarios (usuario, senha) VALUES ('admin', MD5('123456'));