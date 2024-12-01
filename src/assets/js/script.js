let currentIndex = 0;
const items = document.querySelectorAll('.carousel-item');
const totalItems = items.length;

// Função para exibir o slide atual
function showSlide(index) {
  // Garantir que o índice seja válido
  if (index >= totalItems) {
    currentIndex = 0;
  } else if (index < 0) {
    currentIndex = totalItems - 1;
  } else {
    currentIndex = index;
  }

  // Atualizar a posição do carrossel
  document.querySelector('.carousel').style.transform = `translateX(-${currentIndex * 100}%)`;
}

// Botão próximo
function nextSlide() {
  showSlide(currentIndex + 1);
}

// Botão anterior
function prevSlide() {
  showSlide(currentIndex - 1);
}

// Troca automática
setInterval(() => {
  nextSlide();
}, 3000);
