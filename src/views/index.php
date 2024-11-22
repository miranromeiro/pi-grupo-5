<?php  
    session_start();
    if(isset($_SESSION['message'])){
    $mensagem = $_SESSION['message'];
    echo "<p style='color: red;'>$mensagem</p>";
    unset($_SESSION['message']);
       } 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>LOGIN</h2><br><br>

    <form action="../controllers/processaLogin.php" method="POST">
        <label>NOME</label><br>
        <input type="text" name="nome"><br><br>

        <label>SENHA</label><br>
        <input type="password" name="senha"><br><br>
        <input type="submit">
    </form>
    
</body>
</html>