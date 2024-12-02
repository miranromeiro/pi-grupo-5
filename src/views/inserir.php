<!DOCTYPE html>
<html>
<head>
    <title>Inserir Produto</title>
    <link rel="stylesheet" href="/pi-grupo-5/src/assets/styles.css">
</head>
<body>
    <?php include '../controllers/menu.php'; ?>

    <div class="container">
        <form method="post" action="../controllers/processar_produto.php" class="formulario-produtos">
            <h1>Inserir Novo Produto</h1>
            
            <?php if (isset($_GET['erro'])): ?>
                <div class="mensagem erro">
                    <?php echo htmlspecialchars($_GET['erro']); ?>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required>
            </div>

            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" name="marca" id="marca">
            </div>

            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" name="modelo" id="modelo">
            </div>

            <div class="form-group">
                <label for="aplicacao">Aplicação:</label>
                <textarea name="aplicacao" id="aplicacao" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="preco_compra">Preço de Compra:</label>
                <input type="number" name="preco_compra" id="preco_compra" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="preco_venda">Preço de Venda:</label>
                <input type="number" name="preco_venda" id="preco_venda" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="quantidade_estoque">Quantidade em Estoque:</label>
                <input type="number" name="quantidade_estoque" id="quantidade_estoque" required>
            </div>

            <div class="btn-grupo">
                <button type="submit" class="btn btn-primary">Inserir Produto</button>
                <a href="listar_produtos.php" class="btn">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>