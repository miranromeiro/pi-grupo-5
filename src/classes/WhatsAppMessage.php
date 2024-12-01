<?php
class WhatsAppMessage {
    private $phone;
    private $message;

    public function __construct($phone, $message) {
        $this->phone = $this->sanitizePhone($phone);
        $this->message = urlencode($message);
    }

    private function sanitizePhone($phone) {
        // Remove caracteres indesejados, deixando apenas números
        return preg_replace('/\D/', '', $phone);
    }

    public function getWhatsAppLink() {
        return "https://wa.me/{$this->phone}?text={$this->message}";
    }
}
