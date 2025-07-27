console.log("Esta funcionando");
document.getElementById('transar');

// Espera o DOM carregar
document.addEventListener("DOMContentLoaded", function() {
    // Seleciona o pop-up
    const popup = document.querySelector('.msg-popup');

    // Se o pop-up existir
    if (popup) {
        // Define um tempo para o pop-up desaparecer (ex: 4 segundos)
        setTimeout(() => {
            // Adiciona uma animação de fade-out
            popup.style.transition = 'opacity 0.5s ease';
            popup.style.opacity = '0';

            // Remove o elemento do DOM depois da animação
            setTimeout(() => {
                popup.remove();
            }, 500); // Tempo igual à transição do CSS
        }, 4000); // 4000 milissegundos = 4 segundos
    }
});
