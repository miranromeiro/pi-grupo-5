<?php

class Usuario
{
    private $db;

    // Construtor recebe a conexão do banco de dados
    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }

    // Método para fazer login
    public function login($nome, $senha){
        try {
            $sql = "SELECT * FROM usuarios WHERE nome = :nome AND senha = :senha";
            $stmt = $this->db->prepare($sql);

            // Associa os parâmetros
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':senha', $senha);

            $stmt->execute();

            // Verifica se encontrou um usuário
            if ($stmt->rowCount() > 0) {
                return true; // Login bem-sucedido
            } else {
                return false; // Falha no login
            }
        } catch (PDOException $e) {
            echo "Erro ao fazer login: " . $e->getMessage();
            return false;
        }
    }






    public function busca_id($nome, $senha){

        try{

            $sql = "SELECT id FROM usuarios WHERE NOME = :nome AND senha = :senha";
            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':senha', $senha);

            $stmt->execute();

            // Verifica se encontrou um usuário
            if ($stmt->rowCount() > 0) {
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                return $resultado['id'];

            }
        }catch (PDOException $e){
            echo "Erro : " . $e->getMessage();
           
        }  
    }





    public function logout()
{
    // Inicia a sessão caso ainda não tenha sido iniciada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Destroi todas as variáveis de sessão
    session_unset();

    // Destroi a sessão
    session_destroy();

    // Opcional: Redireciona para uma página de login ou inicial
    header("Location: index.php");
    exit();
}




public function verificar_logado() { 
    session_start();
    if (!isset($_SESSION['logado'])) {
        $this->logout_invasor();
    }else{
        return true;
    }
   
    
} 

/**
 * Realiza o logout do usuário.
 *
 * Destroi a sessão e redireciona para a página de login.
 */
public function logout_invasor() { 
    
    session_destroy();

    session_start();
    $_SESSION['message'] = "Faça login antes de acessar qualquer página.";
    header("Location: index.php");
    exit();
} 




    }





