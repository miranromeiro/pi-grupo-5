<?php
$servername = "localhost";
$username = "moto_lazer_admin";
$password = "abc123";
$dbname = "moto_lazer_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>