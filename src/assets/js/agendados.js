document.addEventListener("DOMContentLoaded", () => {
    const detalheBotoes = document.querySelectorAll(".agendamentos__botao-detalhes");

    // Exibir/ocultar detalhes
    detalheBotoes.forEach(botao => {
        botao.addEventListener("click", () => {
            const id = botao.getAttribute("data-id");
            const detalhes = document.getElementById(`detalhes-${id}`);
            if (detalhes.style.display === "none") {
                detalhes.style.display = "table-row";
                botao.innerHTML = "&#9650;"; // Muda seta para cima
            } else {
                detalhes.style.display = "none";
                botao.innerHTML = "&#9660;"; // Muda seta para baixo
            }
        });
    });
});
