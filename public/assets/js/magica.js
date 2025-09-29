// mágica

document.addEventListener("DOMContentLoaded", () => {
  const cartasContainer = document.getElementById("cartas");

  const observerOptions = {
    root: null,
    rootMargin: "0px",
    threshold: 0.5, // A animação inicia quando 50% da seção estiver visível
  };

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        revelarCartasInicial(); // Inicia a animação das cartas diretamente
        observer.unobserve(entry.target); // Desliga o observer após iniciar a mágica
      }
    });
  }, observerOptions);

  if (cartasContainer) {
    observer.observe(cartasContainer); // Inicia a observação da seção das cartas
  }
});

function revelarCartasInicial() {
  const cartasContainer = document.getElementById("cartas");
  const cartas = cartasContainer.querySelectorAll(".carta");
  const tituloGeral = document.querySelector(".titulo-geral");
  tituloGeral.style.opacity = 1; // Assegura que o título esteja visível

  cartasContainer.style.opacity = 1;
  cartasContainer.style.transform = "scale(1)";

  cartas.forEach((carta, i) => {
    setTimeout(() => {
      carta.querySelector(".verso").style.transform = "rotateY(180deg)";
      carta.querySelector(".frente").style.transform = "rotateY(0deg)";
    }, (i + 1) * 1000);
  });

  setTimeout(() => {
    cartasContainer.style.opacity = 0; // Esconde as cartas após todas serem reveladas
    tituloGeral.style.opacity = 0; // Oculta o título inicial
    setTimeout(() => {
      tituloGeral.textContent = "Vou remover a única carta que você pensou...";
      tituloGeral.style.opacity = 1; // Mostra o novo texto
      setTimeout(revelarCartasFinal, 2000);
    }, 2000); // Aguarda 2 segundos antes de mostrar o novo texto
  }, (cartas.length + 1) * 1000);
}

function revelarCartasFinal() {
  const cartasContainer = document.getElementById("cartas");
  const tituloGeral = document.querySelector(".titulo-geral");

  cartasContainer.innerHTML = `
    <div class="carta"><img src="${BASE_URL}assets/imgs/cartas/carta_azul.webp" class="verso" /><img src="${BASE_URL}assets/imgs/cartas/damas_copas.webp" class="frente" /></div>
    <div class="carta"><img src="${BASE_URL}assets/imgs/cartas/carta_vermelha.webp" class="verso" /><img src="${BASE_URL}assets/imgs/cartas/rei_espada.webp" class="frente" /></div>
    <div class="carta"><img src="${BASE_URL}assets/imgs/cartas/carta_azul.webp" class="verso" /><img src="${BASE_URL}assets/imgs/cartas/valete_ouro.webp" class="frente" /></div>
    <div class="carta"><img src="${BASE_URL}assets/imgs/cartas/carta_vermelha.webp" class="verso" /><img src="${BASE_URL}assets/imgs/cartas/damas_paus.webp" class="frente" /></div>
    `;
  const novasCartas = cartasContainer.querySelectorAll(".carta");
  cartasContainer.style.opacity = 1;

  novasCartas.forEach((carta, i) => {
    setTimeout(() => {
      carta.querySelector(".verso").style.transform = "rotateY(180deg)";
      carta.querySelector(".frente").style.transform = "rotateY(0deg)";
    }, (i + 1) * 1000);
  });

  setTimeout(() => {
    tituloGeral.textContent = "Acertei?";
    setTimeout(() => {
      tituloGeral.textContent =
        "Desça a página e saiba mais sobre o meu trabalho.";
    }, 3000);
  }, (novasCartas.length + 1) * 1000);
}
