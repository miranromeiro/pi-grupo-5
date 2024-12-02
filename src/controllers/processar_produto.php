<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acao = isset($_POST['acao']) ? $_POST['acao'] : 'inserir';

    $nome = trim($_POST['nome']);
    $marca = trim($_POST['marca']);
    $modelo = trim($_POST['modelo']);
    $aplicacao = trim($_POST['aplicacao']);
    $descricao = trim($_POST['descricao']);
    $preco_compra = floatval($_POST['preco_compra']);
    $preco_venda = floatval($_POST['preco_venda']);
    $quantidade_estoque = intval($_POST['quantidade_estoque']);

    if ($acao === 'editar') {
        $id = intval($_POST['id']);
        $sql = "UPDATE produtos SET nome=?, marca=?, modelo=?, aplicacao=?, descricao=?, 
                preco_compra=?, preco_venda=?, quantidade_estoque=? WHERE id=?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssddii", $nome, $marca, $modelo, $aplicacao, $descricao, 
                         $preco_compra, $preco_venda, $quantidade_estoque, $id);
        
        if ($stmt->execute()) {
            header("Location: ../views/estoque/listar_produtos.php?mensagem=Produto atualizado com sucesso!");
        } else {
            header("Location: ../views/estoque/editar.php?id=$id&erro=Erro ao atualizar produto");
        }
    } else {
        $sql = "INSERT INTO produtos (nome, marca, modelo, aplicacao, descricao, preco_compra, 
                preco_venda, quantidade_estoque) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssddi", $nome, $marca, $modelo, $aplicacao, $descricao, 
                         $preco_compra, $preco_venda, $quantidade_estoque);
        
        if ($stmt->execute()) {
            header("Location: ../views/estoque/listar_produtos.php?mensagem=Produto cadastrado com sucesso!");
        } else {
            header("Location: ../views/estoque?inserir.php?erro=Erro ao cadastrar produto");
        }
    }
    
    $stmt->close();
} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['acao']) && $_GET['acao'] === 'excluir') {
    $id = intval($_GET['id']);
    
    $sql = "DELETE FROM produtos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: ../views/estoque/listar_produtos.php?mensagem=Produto excluído com sucesso!");
    } else {
        header("Location: ../views/estoque/listar_produtos.php?erro=Erro ao excluir produto");
    }
    
    $stmt->close();
}

$conn->close();
?>