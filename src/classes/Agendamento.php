<?php

class Agendamento
{
    private $conexao;

    // Construtor: Recebe a conexão com o banco de dados
    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    // Método para agendar e gravar os dados no banco
    public function agendar($dados)
    {
        try {
            // Preparar a query para inserir os dados
            $sql = "INSERT INTO agendamentos (cliente_nome, cliente_telefone, veiculo_descricao, data_agendamento, valor_servico, servico_descricao) 
                    VALUES (:cliente_nome, :cliente_telefone, :veiculo_descricao, :data_agendamento, :valor_servico, :servico_descricao)";

            $stmt = $this->conexao->prepare($sql);

            // Vincular os valores aos parâmetros da query
            $stmt->bindParam(':cliente_nome', $dados['cliente_nome']);
            $stmt->bindParam(':cliente_telefone', $dados['cliente_telefone']);
            $stmt->bindParam(':veiculo_descricao', $dados['veiculo_descricao']);
            $stmt->bindParam(':data_agendamento', $dados['data_agendamento']);
            $stmt->bindParam(':valor_servico', $dados['valor_servico']);
            $stmt->bindParam(':servico_descricao', $dados['servico_descricao']);

            // Executar a query
            if ($stmt->execute()) {
               // return "Agendamento realizado com sucesso!";
            } else {
                return "Falha ao realizar o agendamento.";
            }
        } catch (PDOException $e) {
            return "Erro ao agendar: " . $e->getMessage();
        }
    }






    public function mostra_agendamentos() {
        $query = "SELECT id, cliente_nome, cliente_telefone, veiculo_descricao, servico_descricao, valor_servico, data_agendamento, created_at FROM agendamentos";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


}
