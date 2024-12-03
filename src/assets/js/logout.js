// Função para exibir o popup
function confirmLogout() {
    document.getElementById('logout-popup').style.display = 'flex';
}

// Função para realizar o logout
function proceedLogout() {
    window.location.href = 'logout.php';
}

// Função para fechar o popup
function closePopup() {
    document.getElementById('logout-popup').style.display = 'none';
}