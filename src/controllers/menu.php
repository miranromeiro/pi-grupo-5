<?php

echo "
<div class='menu-container'>
    <div class='menu-bar'>
        <div class='menu-logo'>
            <!-- Espaço para a logo -->
            <img src='../assets/img/logo/logo_maior.png' alt='Logo do site'>
        </div>
        <ul class='menu-items'>
            <li><a href='home.php'>INÍCIO</a></li>
            <li><a href='agendar.php'>AGENDAR</a></li>
            <li><a href='agendados.php'>AGENDADOS</a></li>
            <li><a href='listar_produtos.php'>ESTOQUE</a></li>
            <li><a href='#' onclick='confirmLogout()'>LOGOUT</a></li>
        </ul>
        <div class='menu_imagem_mobile'id='meu_menu_bt'>
           <img src='../assets/img/icones_comuns/menu_mobile/cardapio50.png'>
        </div>
    </div>
</div>

<!-- Popup de confirmação -->
<div id='logout-popup' class='popup-container'>
    <div class='popup-content'>
        <p>Tem certeza que deseja sair?</p>
        <button onclick='proceedLogout()'>Sim</button>
        <button onclick='closePopup()'>Não</button>
    </div>
</div>

<div class='menu_mobile' id='meu_menu_corpo'>
   <ul class='menu-items-mobile'>
            <li><a href='home.php'>INÍCIO</a></li>
            <li><a href='agendar.php'>AGENDAR</a></li>
            <li><a href='agendados.php'>AGENDADOS</a></li>
            <li><a href='listar_produtos.php'>ESTOQUE</a></li>
            <li><a href='#' onclick='confirmLogout()'>LOGOUT</a></li>
    </ul>
</div>

";

?>