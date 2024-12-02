<?php
require '../classes/Usuario.php';
require '../classes/Connection.php';
require '../classes/Produto.php';

$db = new Connection();
$conn = $db->getConnection();

$usuario = new Usuario($db->getConnection());
$usuario->verificar_logado();

$sql = "SELECT * FROM produtos ORDER BY id DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$mensagem = isset($_GET['mensagem']) ? htmlspecialchars($_GET['mensagem']) : '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Estoque de Produtos</title>
    <link rel="stylesheet" href="/pi-grupo-5/src/assets/styles.css">
</head>
<body>
    <?php include '../controllers/menu.php'; ?>

    <div class="container">
        <h1 style="text-align: center;">Estoque de Produtos</h1>
        
        <?php if ($mensagem): ?>
            <div class=".mensagem .sucesso"><?php echo $mensagem; ?></div>
        <?php endif; ?>

        <a href="inserir.php" class="btn btn-primary">Novo Produto</a>

        <?php if (!empty($result)): ?>
            <table class="produtos-tabela">
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
                    <?php foreach ($result as $row): ?>
                        <tr>
                            <td><?= $row["id"] ?></td>
                            <td><?= $row["nome"] ?></td>
                            <td><?= $row["marca"] ?></td>
                            <td><?= $row["modelo"] ?></td>
                            <td>R$ <?= number_format($row["preco_compra"], 2, ',', '.') ?></td>
                            <td>R$ <?= number_format($row["preco_venda"], 2, ',', '.') ?></td>
                            <td><?= $row["quantidade_estoque"] ?></td>
                            <td class="acoes">
                                <a href="editar.php?id=<?= $row["id"] ?>" class="btn btn-primary">Editar</a>
                                <a href="#" onclick="confirmarExclusao(<?= $row['id'] ?>)" class="btn btn-danger">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p style="text-align: center;">Nenhum produto cadastrado.</p>
        <?php endif; ?>
    </div>

    <script>
        function confirmarExclusao(id) {
            if (confirm('Tem certeza que deseja excluir este produto?')) {
                window.location.href = '../controllers/processar_produto.php?acao=excluir&id=' + id;
            }
        }
    </script>
    <script src="../assets/js/logout.js"></script>   
</body>
</html>