<?php

require '../classes/Usuario.php';
require_once "../classes/Connection.php";
include_once '../classes/Agendamento.php';

// Verifica usuário logado
$db = new Connection;
$validador = new Usuario($db->getConnection());
$validador->verificar_logado();

// Conecta com o banco de dados
$conexao = $db->getConnection();
$cadastro = new Agendamento($conexao);

$registros = $cadastro->mostra_agendamentos();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Agendamentos</title>
    <link rel="stylesheet" href="../assets/styles.css?v=3.0">
</head>
<body>
    <?php include "../controllers/menu.php"; ?>

    <h2 class="agendamentos__titulo">Lista de Agendamentos</h2>
    <div class="centraliza_lista_agendados">
    <table class="agendamentos__tabela">
        <thead class="agendamentos__cabecalho">
            <tr>

                <th class="agendamentos__coluna-cliente">Nome do Cliente</th>
                <th class="agendamentos__coluna-telefone">Telefone</th>
                <th class="agendamentos__coluna-moto">Moto</th>
                <th class="agendamentos__coluna-detalhes">Detalhes</th>
            </tr>
        </thead>
        <tbody class="agendamentos__conteudo">
        <?php foreach (array_reverse($registros) as $registro): ?>
    <tr class="agendamentos__linha">

        <td class="agendamentos__item-cliente"><?php echo $registro['cliente_nome']; ?></td>
        <td class="agendamentos__item-telefone"><?php echo $registro['cliente_telefone']; ?></td>
        <td class="agendamentos__item-moto"><?php echo $registro['veiculo_descricao']; ?></td>
        <td class="agendamentos__item-detalhes">
            <button class="agendamentos__botao-detalhes" data-id="<?php echo $registro['id']; ?>">&#9660;</button>
        </td>
    </tr>
    <tr class="agendamentos__linha-detalhes" id="detalhes-<?php echo $registro['id']; ?>" style="display: none;">
        <td colspan="5" class="agendamentos__detalhes">
            <?php
            
            //arrumo a data 
            $data_agendada_formatada = (new DateTime($registro['data_agendamento']))->format('d/m/Y');
            $data_realizada_formatada = (new DateTime($registro['created_at']))->format('d/m/Y');

            ?>
            <p><strong>ID:</strong> <?php echo $registro['id']; ?></p>
            <p><strong>Descrição do Serviço:</strong> <?php echo $registro['servico_descricao']; ?></p>
            <p><strong>Estimativa de Valor:</strong> <?php echo $registro['valor_servico']; ?></p>
            <p><strong>Data Agendada:</strong> <?php echo $data_agendada_formatada; ?></p>
            <p><strong>Dia Realizado o Agendamento:</strong> <?php echo $data_realizada_formatada; ?></p>
            <?php
                require_once '../classes/WhatsAppMessage.php';

                $phone = $registro['cliente_telefone'];
                //arrumo a data 
                $data_formatada = (new DateTime($registro['data_agendamento']))->format('d/m/Y');

                $message = "Olá, " . $registro['cliente_nome']." aqui é o Cláudio da moto lazer, só passando para avisar que seu agendamento da sua " . $registro['veiculo_descricao']. " foi realizado com sucesso e está confirmado para a data ". $data_formatada . ", te aguardo até lá!";

                $whatsApp = new WhatsAppMessage($phone, $message);
                $link = $whatsApp->getWhatsAppLink();
            ?>
            <button class="agendamentos__botao-whatsapp">
                <?php echo "<a href='$link' target='_blank'>Enviar WhatsApp</a>"; ?>
            </button>
        </td>
    </tr>
<?php endforeach; ?>

        </tbody>
    </table>
    </div>

    <script src="../assets/js/agendados.js"></script>
    <script src="../assets/js/logout.js"></script>
    <script src="../assets/js/manipula_menu_mobile.js"></script>   
</body>
</html>
