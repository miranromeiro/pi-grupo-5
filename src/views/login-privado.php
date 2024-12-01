<?php  
    session_start();
    if(isset($_SESSION['message'])){
    $mensagem = $_SESSION['message'];
    echo "<p style='color: red;'>$mensagem</p>";
    unset($_SESSION['message']);
       } 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tela de Login</title>
  <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
  <div class="login-container">
    <div class="login-box">
      <div class="login-circle">
        <img class="login-img" src="../assets/img/icones_comuns/icons8-trabalho-96.png" alt="Usuário">
      </div>
      <form class="login-form" action="../controllers/processaLogin.php" method="POST">
        <label class="login-label" for="username">Usuário</label>
        <input class="login-input" type="text" id="username" name="nome" placeholder="Digite seu usuário" required>
        
        <label class="login-label" for="password">Senha</label>
        <input class="login-input" type="password" id="password" name="senha" placeholder="Digite sua senha" required>
        <div class="centraliza_bt_logar">
                  <input  class="login-button" type="submit" value="LOGIN">
        </div>
      </form>
    </div>
  </div>
</body>
</html>
