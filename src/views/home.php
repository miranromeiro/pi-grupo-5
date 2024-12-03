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
    <div class="tela_home">
    <?php
       include "../controllers/menu.php";
    ?>
    <div class="centraliza_img">
        <img src="../assets/img/outras_imagens/papel_parede.png" alt="erro">
    </div>
    </div>

    <script src="../assets/js/logout.js"></script>   
    <script src="../assets/js/manipula_menu_mobile.js"></script>   
</body>
</html>