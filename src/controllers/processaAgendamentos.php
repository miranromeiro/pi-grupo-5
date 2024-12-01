<?php
// Inclui a conexão com o banco de dados
require_once '../classes/Connection.php';

// Inclui a classe Agendamento
require_once '../classes/Agendamento.php';

try {
    $conexao = new Connection;
    // Instancia a classe Agendamento com a conexão
    $agendamento = new Agendamento($conexao->getConnection());

    // Verifica se os dados do formulário foram enviados
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Dados do formulário
        $dados = [
            'cliente_nome' => $_POST['nome'],
            'cliente_telefone' => $_POST['celular'],
            'veiculo_descricao' => $_POST['nome_moto'],
            'data_agendamento' => $_POST['data_agendamento'],
            'valor_servico' => $_POST['estimativa_valor'],
            'servico_descricao' => $_POST['descricao_problema']
        ];

        // Chama o método agendar e exibe a mensagem
        $mensagem = $agendamento->agendar($dados);
        //echo $mensagem;
        header("location:../views/agendados.php");
    } else {
        echo "Formulário não enviado.";
    }
} catch (Exception $e) {
    // Tratamento de erro geral
    echo "Erro no processamento: " . $e->getMessage();
}
