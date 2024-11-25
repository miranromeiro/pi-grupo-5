<?php
include '../controllers/conexao.php';

$sql = "SELECT * FROM produtos ORDER BY id DESC";
$result = $conn->query($sql);

$mensagem = isset($_GET['mensagem']) ? $_GET['mensagem'] : '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Estoque de Produtos</title>
    <link rel="stylesheet" href="/pi-grupo-5/src/assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Estoque de Produtos</h1>
        
        <?php if ($mensagem): ?>
            <div class="mensagem sucesso">
                <?php echo htmlspecialchars($mensagem); ?>
            </div>
        <?php endif; ?>

        <a href="inserir.php" class="btn btn-primary">Novo Produto</a>

        <?php if ($result->num_rows > 0): ?>
            <table class="produto-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Preço Compra</th>
                        <th>Preço Venda</th>
                        <th>Estoque</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row["id"]); ?></td>
                            <td><?php echo htmlspecialchars($row["nome"]); ?></td>
                            <td><?php echo htmlspecialchars($row["marca"]); ?></td>
                            <td><?php echo htmlspecialchars($row["modelo"]); ?></td>
                            <td>R$ <?php echo number_format($row["preco_compra"], 2, ',', '.'); ?></td>
                            <td>R$ <?php echo number_format($row["preco_venda"], 2, ',', '.'); ?></td>
                            <td><?php echo htmlspecialchars($row["quantidade_estoque"]); ?></td>
                            <td>
                                <a href="editar.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Editar</a>
                                <a href="#" onclick="confirmarExclusao(<?php echo $row['id']; ?>)" class="btn btn-danger">Excluir</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum produto cadastrado.</p>
        <?php endif; ?>
    </div>
    <script>
        function confirmarExclusao(id) {
            if (confirm('Tem certeza que deseja excluir este produto?')) {
                window.location.href = '../controllers/processar_produto.php?acao=excluir&id=' + id;
            }
        }
</script>
</body>
</html>
