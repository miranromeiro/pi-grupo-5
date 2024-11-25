<!DOCTYPE html>
<html>
<head>
    <title>Editar Produto</title>
    <link rel="stylesheet" href="/pi-grupo-5/src/assets/css/style.css">
</head>
<body>
    <div class="container">
        <?php
        include '../controllers/conexao.php';
        
        if (!isset($_GET['id'])) {
            header("Location: listar.php?erro=ID não fornecido");
            exit();
        }
        
        $id = intval($_GET['id']);
        $sql = "SELECT * FROM produtos WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $produto = $result->fetch_assoc();
        
        if (!$produto) {
            header("Location: listar.php?erro=Produto não encontrado");
            exit();
        }
        ?>

        <h1>Editar Produto</h1>
        
        <?php if (isset($_GET['erro'])): ?>
            <div class="mensagem erro">
                <?php echo htmlspecialchars($_GET['erro']); ?>
            </div>
        <?php endif; ?>

        <form method="post" action="../controllers/processar_produto.php">
            <input type="hidden" name="acao" value="editar">
            <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
            
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>" required>
            </div>

            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" name="marca" id="marca" value="<?php echo htmlspecialchars($produto['marca']); ?>">
            </div>

            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" name="modelo" id="modelo" value="<?php echo htmlspecialchars($produto['modelo']); ?>">
            </div>

            <div class="form-group">
                <label for="aplicacao">Aplicação:</label>
                <textarea name="aplicacao" id="aplicacao" rows="3"><?php echo htmlspecialchars($produto['aplicacao']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" rows="3"><?php echo htmlspecialchars($produto['descricao']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="preco_compra">Preço de Compra:</label>
                <input type="number" name="preco_compra" id="preco_compra" step="0.01" value="<?php echo $produto['preco_compra']; ?>" required>
            </div>

            <div class="form-group">
                <label for="preco_venda">Preço de Venda:</label>
                <input type="number" name="preco_venda" id="preco_venda" step="0.01" value="<?php echo $produto['preco_venda']; ?>" required>
            </div>

            <div class="form-group">
                <label for="quantidade_estoque">Quantidade em Estoque:</label>
                <input type="number" name="quantidade_estoque" id="quantidade_estoque" value="<?php echo $produto['quantidade_estoque']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="listar.php" class="btn">Cancelar</a>
        </form>
    </div>
</body>
</html>