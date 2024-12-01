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
    <title>inicio</title>
    <link rel="stylesheet" href="../assets/styles.css?v=1.0">
    </head>
<body>
    <?php
       include "../controllers/menu.php";

       echo "<br>";
       if(isset($_SESSION['id_user'])){
        echo $_SESSION['id_user'];

       }
    ?>
    <h2>olá</h2>

    <script src="../assets/js/logout.js"></script>   
</body>
</html>