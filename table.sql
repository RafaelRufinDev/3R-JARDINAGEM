CREATE TABLE nome_da_tabela (
    id INT(11) NOT NULL AUTO_INCREMENT,
    Nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    Telefone VARCHAR(20) NOT NULL,
    Logradouro VARCHAR(200) NOT NULL,
    Numero INT(7) NOT NULL,
    Complemento VARCHAR(150) NOT NULL,
    Bairro VARCHAR(200) NOT NULL,
    Cidade VARCHAR(150) NOT NULL,
    Servicos VARCHAR(150) NOT NULL,
    PRIMARY KEY (id)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
