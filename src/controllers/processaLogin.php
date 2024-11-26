<?php

//Aqui estou importando as classes Connectio e Usuario
    require_once "../classes/Connection.php";
    require_once "../classes/Usuario.php";

//estou criando um objeto db e user
    $db = new Connection;
    $user = new Usuario($db->getConnection());

    //estou recebendo da tela login de views o nome e senha do usuario que esta tentando logar
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];


    //estou acessando o método login e passo para ele nome e senha
  $resposta_login =  $user->login($nome, $senha);
  

  //      aqui eu pego  a resposta que veio do método login e 
  //      que foi guardado em reposta_login e verifico se o valor é 
  //      um true ou false e se for true, eu mando para tela home, se for 
  //      false eu devolvo para a tela login pois seus dados estão errados

  if($resposta_login){
    session_start();
    $id_user = $user->busca_id($nome, $senha);
    $_SESSION['id_user'] = $id_user;
    $_SESSION['logado'] = true;
    
    header("location:../views/home.php");
  }else{
    header("location:../views/login-privado.php");

  }





    














?>