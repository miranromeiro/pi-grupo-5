<?php

require '../classes/Usuario.php';
require_once "../classes/Connection.php";
include_once '../classes/Agendamento.php';

//ferifica usuario logado
$db = new Connection;
$validador = new Usuario($db->getConnection());
$validador->verificar_logado();

//Se conecta com o banco de dados
$conexao = $db->getConnection();

$cadastro = new Agendamento($conexao);


$registros = $cadastro->mostra_agendamentos();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/styles.css?v=1.0">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <?php
         include "../controllers/menu.php";   
    ?>
    <h2>Lista de Agendamentos</h2>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME DO CLIENTE</th>
                <th>TELEFONE</th>
                <th>MOTO</th>
                <th>DESCRIÇÃO DO SERVIÇO</th>
                <th>ESTIMATIVA DE VALOR</th>
                <th>DATA AGENDADA</th>
                <th>DIA REALIZADO O AGENDAMENTO</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($registros as $registro): ?>
                <tr>
                    <td><?php echo $registro['id']; ?></td>
                    <td><?php echo $registro['cliente_nome']; ?></td>
                    <td><?php echo $registro['cliente_telefone']; ?></td>
                    <td><?php echo $registro['veiculo_descricao']; ?></td>
                    <td><?php echo $registro['servico_descricao']; ?></td>
                    <td><?php echo $registro['valor_servico']; ?></td>
                    <td><?php echo $registro['data_agendamento']; ?></td>
                    <td><?php echo $registro['created_at']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</body>
</html>