CREATE DATABASE biblioteca_crud;

USE biblioteca_crud;

CREATE TABLE autores{
    id_autor INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    nacionalidade VARCHAR(255) NOT NULL,
    ano_nascimento YEAR NOT NULL
}

CREATE TABLE livros{
    id_livro INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    genero VARCHAR(255) NOT NULL,
    ano_publicacao YEAR NOT NULL,
    id_autor_fk INT, 
    FOREIGN KEY (id_autor_fk) REFERENCES autores(id_autor) ON DELETE SET NULL
}

CREATE TABLE leitores{
    id_leitor INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    telefone VARCHAR(255) NOT NULL
}

CREATE TABLE emprestimos{
    id_emprestimo INT AUTO_INCREMENT PRIMARY KEY,
    id_livro_fk INT,
    FOREIGN KEY (id_livro_fk) REFERENCES livros(id_livro),
    id_leitor_fk INT,
    FOREIGN KEY (id_leitor_fk) REFERENCES leitores(id_leitor),
    data_emprestimo DATE NOT NULL,
    data_devolucao DATE
}