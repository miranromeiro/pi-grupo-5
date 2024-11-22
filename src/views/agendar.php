<?php
require '../classes/Usuario.php';
require_once "../classes/Connection.php";

$db = new Connection;
$validador = new Usuario($db->getConnection());
$validador->verificar_logado();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Agendamento</title>
</head>
<body>
    <?php
    
    include "../controllers/menu.php";
    
    ?>
    <h1>Agendamento de Serviço</h1>
    <form action="../controllers/processaAgendamentos.php" method="POST">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="celular">Celular:</label><br>
        <input type="tel" id="celular" name="celular" placeholder="(XX) XXXXX-XXXX" required><br><br>

        <label for="nome_moto">Nome da Moto:</label><br>
        <input type="text" id="nome_moto" name="nome_moto" required><br><br>

        <label for="data_agendamento">Data de Agendamento:</label><br>
        <input type="date" id="data_agendamento" name="data_agendamento" required><br><br>

        <label for="estimativa_valor">Estimativa de Valor:</label><br>
        <input type="number" id="estimativa_valor" name="estimativa_valor" step="0.01" placeholder="Ex: 150.00" required><br><br>

        <label for="descricao_problema">Descrição do Problema:</label><br>
        <textarea id="descricao_problema" name="descricao_problema" rows="4" cols="50" required></textarea><br><br>

        <button type="submit">Finalizar</button>
    </form>
</body>
</html>
