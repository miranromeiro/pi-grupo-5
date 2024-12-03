<?php

class Produto
{
    private $nome;
    private $marca;
    private $modelo;
    private $aplicacao;
    private $descricao;
    private $preco_compra;
    private $preco_venda;
    private $quantidade_estoque;

    public function __construct($nome, $marca, $modelo, $aplicacao, $descricao, $preco_compra, $preco_venda, $quantidade_estoque)
    {
        $this->nome = $nome;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->aplicacao = $aplicacao;
        $this->descricao = $descricao;
        $this->preco_compra = $preco_compra;
        $this->preco_venda = $preco_venda;
        $this->quantidade_estoque = $quantidade_estoque;
    }

    public function save($conn)
    {
        $sql = "INSERT INTO produtos (nome, marca, modelo, aplicacao, descricao, preco_compra, preco_venda, quantidade_estoque)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([
            $this->nome,
            $this->marca,
            $this->modelo,
            $this->aplicacao,
            $this->descricao,
            $this->preco_compra,
            $this->preco_venda,
            $this->quantidade_estoque
        ]);
    }

    public static function update($conn, $id, $dados)
    {
        $sql = "UPDATE produtos SET nome=?, marca=?, modelo=?, aplicacao=?, descricao=?, preco_compra=?, preco_venda=?, quantidade_estoque=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([
            $dados['nome'],
            $dados['marca'],
            $dados['modelo'],
            $dados['aplicacao'],
            $dados['descricao'],
            $dados['preco_compra'],
            $dados['preco_venda'],
            $dados['quantidade_estoque'],
            $id
        ]);
    }

    public static function delete($conn, $id)
    {
        $sql = "DELETE FROM produtos WHERE id=?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
