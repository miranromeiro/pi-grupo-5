<?php

require '../classes/Produto.php';
require '../classes/Connection.php';

$connection = new Connection();
$conn = $connection->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acao = isset($_POST['acao']) ? $_POST['acao'] : 'inserir';

    $dados = [
        'nome' => trim($_POST['nome']),
        'marca' => trim($_POST['marca']),
        'modelo' => trim($_POST['modelo']),
        'aplicacao' => trim($_POST['aplicacao']),
        'descricao' => trim($_POST['descricao']),
        'preco_compra' => floatval($_POST['preco_compra']),
        'preco_venda' => floatval($_POST['preco_venda']),
        'quantidade_estoque' => intval($_POST['quantidade_estoque'])
    ];

    if ($acao === 'editar') {
        $id = intval($_POST['id']);
        if (Produto::update($conn, $id, $dados)) {
            header("Location: ../views/listar_produtos.php?mensagem=Produto atualizado com sucesso!");
        } else {
            header("Location: ../views/editar.php?id=$id&erro=Erro ao atualizar produto");
        }
    } else {
        $produto = new Produto(
            $dados['nome'],
            $dados['marca'],
            $dados['modelo'],
            $dados['aplicacao'],
            $dados['descricao'],
            $dados['preco_compra'],
            $dados['preco_venda'],
            $dados['quantidade_estoque']
        );

        if ($produto->save($conn)) {
            header("Location: ../views/listar_produtos.php?mensagem=Produto cadastrado com sucesso!");
        } else {
            header("Location: ../views/inserir.php?erro=Erro ao cadastrar produto");
        }
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['acao']) && $_GET['acao'] === 'excluir') {
    $id = intval($_GET['id']);

    if (Produto::delete($conn, $id)) {
        header("Location: ../views/listar_produtos.php?mensagem=Produto excluído com sucesso!");
    } else {
        header("Location: ../views/listar_produtos.php?erro=Erro ao excluir produto");
    }
}
