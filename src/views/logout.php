<?php
require '../classes/Usuario.php';
require_once "../classes/Connection.php";

$db = new Connection;
$sair = new Usuario($db->getConnection());

$sair->logout();