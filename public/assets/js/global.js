// Função para salvar links

const socialLinks = {
  whatsappCaio: "#",
  instagramCaio: "https://www.instagram.com/caiomartinsomagico/",
  facebookCaio: "https://www.facebook.com/CaioMartinsOmagico",
  twitterCaio: "https://twitter.com/caiomartinsomag",
  siteTininho: "https://tininhofita.com",
  youtubeCaio: "https://www.youtube.com/channel/UCP0GCsHtgGdCyQMA2QCbZ6g",
  tiktokCaio: "https://www.tiktok.com/@caiomartinsomagico",
  kwaiCaio: "https://www.kwai.com/@caiomagico",
};

function adicionarLinksSociais() {
  document
    .querySelectorAll(".whatsCaio")
    .forEach(
      (element) => (element.parentElement.href = socialLinks.whatsappCaio)
    );
  document
    .querySelectorAll(".instaCaio")
    .forEach(
      (element) => (element.parentElement.href = socialLinks.instagramCaio)
    );
  document
    .querySelectorAll(".faceCaio")
    .forEach(
      (element) => (element.parentElement.href = socialLinks.facebookCaio)
    );
  document
    .querySelectorAll(".xCaio")
    .forEach(
      (element) => (element.parentElement.href = socialLinks.twitterCaio)
    );
  document
    .querySelectorAll(".siteTininho")
    .forEach((element) => (element.href = socialLinks.siteTininho));
  document
    .querySelectorAll(".youtubeCaio")
    .forEach(
      (element) => (element.parentElement.href = socialLinks.youtubeCaio)
    );
  document
    .querySelectorAll(".tiktokCaio")
    .forEach(
      (element) => (element.parentElement.href = socialLinks.tiktokCaio)
    );
  document
    .querySelectorAll(".kwaiCaio")
    .forEach((element) => (element.parentElement.href = socialLinks.kwaiCaio));
}

document.addEventListener("DOMContentLoaded", adicionarLinksSociais);

// Animação de Títulos e Contador de seguidores/inscritos de Redes

// Função para animar os valores
function animaValor(objeto, inicio, fim, duracao) {
  let inicioTempo = null;
  const passo = (momentoAtual) => {
    if (!inicioTempo) inicioTempo = momentoAtual;
    const progresso = Math.min((momentoAtual - inicioTempo) / duracao, 1);
    objeto.innerText = Math.floor(progresso * (fim - inicio) + inicio);
    if (progresso < 1) {
      window.requestAnimationFrame(passo);
    }
  };
  window.requestAnimationFrame(passo);
}

// Observador para a animação de contagem
const observador = new IntersectionObserver(
  (entries, observer) => {
    entries.forEach((entrada) => {
      // Verifica se o elemento está visível
      if (entrada.isIntersecting) {
        const contador = entrada.target;
        const alvo = +contador.getAttribute("data-target");
        animaValor(contador, 0, alvo, 2000);
        // Depois de animar, não precisa mais observar o elemento
        observer.unobserve(contador);
      }
    });
  },
  {
    threshold: 0.5, //50% do item deve estar visível para a animação ocorrer
  }
);

// Seleciona todos os elementos que devem ter a animação
document.addEventListener("DOMContentLoaded", () => {
  const contadores = document.querySelectorAll(".contador");
  contadores.forEach((contador) => {
    observador.observe(contador); // Inicia a observação
  });
});

// Função para animar titulos

document.addEventListener("DOMContentLoaded", () => {
  const titulos = document.querySelectorAll(".titulo-geral"); // Seleciona todos os elementos

  let observer = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("mostrar");
          observer.unobserve(entry.target); // Para de observar após a animação ocorrer
        }
      });
    },
    { threshold: 0.1 }
  ); // O elemento fica visível quando 10% dele está visível na tela

  titulos.forEach((titulo) => {
    observer.observe(titulo); // Inicia a observação para cada título
  });
});
