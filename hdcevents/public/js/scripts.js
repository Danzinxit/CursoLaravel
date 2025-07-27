console.log("Esta funcionando");
document.getElementById('transar');

document.addEventListener("DOMContentLoaded", function() {
    // Seleciona o pop-up de mensagem
    const popup = document.querySelector('.msg-popup');

    // Se o pop-up existir na página
    if (popup) {
        // A animação de entrada e saída agora é controlada totalmente pelo CSS.
        // O JavaScript só precisa remover o elemento do DOM após a animação de saída.
        // Duração total: 0.5s (entrada) + 4s (visível) + 0.5s (saída) = 5s
        setTimeout(() => {
            // Verifica novamente se o popup ainda existe antes de tentar removê-lo
            // (o usuário pode ter navegado para outra página)
            if (popup) {
                popup.remove();
            }
        }, 5000); // 5000 milissegundos = 5 segundos
    }
});
