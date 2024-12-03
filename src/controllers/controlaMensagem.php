<?php
require_once '../classes/WhatsAppMessage.php';

$phone = "+5519997536721"; // Número do cliente
$message = "Olá, temos uma promoção especial para você!";

$whatsApp = new WhatsAppMessage($phone, $message);
$link = $whatsApp->getWhatsAppLink();

echo "Clique <a href='$link' target='_blank'>aqui</a> para enviar a mensagem via WhatsApp.";
?>