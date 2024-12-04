-- Criação da tabela USUARIOS
CREATE TABLE USUARIOS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    telefone VARCHAR(20) NOT NULL
);

-- Criação da tabela PRODUTOS
CREATE TABLE PRODUTOS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    marca TEXT NOT NULL,
    modelo TEXT NOT NULL,
    aplicacao TEXT NOT NULL,
    descricao TEXT,
    preco_compra DECIMAL(10, 2) NOT NULL,
    preco_venda DECIMAL(10, 2) NOT NULL,
    quantidade_estoque INT NOT NULL
);

-- Criação da tabela AGENDAMENTOS
CREATE TABLE AGENDAMENTOS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_nome VARCHAR(255) NOT NULL,
    cliente_telefone VARCHAR(20) NOT NULL,
    veiculo_descricao VARCHAR(255) NOT NULL,
    data_agendamento DATETIME NOT NULL,
    valor_servico DECIMAL(10, 2) NOT NULL,
    servico_descricao TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
