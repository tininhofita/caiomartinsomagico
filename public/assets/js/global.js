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

// Header Moderno - Funcionalidades
document.addEventListener("DOMContentLoaded", () => {
  const header = document.querySelector(".header-modern");
  const mobileToggle = document.querySelector(".mobile-toggle");
  const navbarCollapse = document.querySelector(".navbar-collapse");

  // Header fixo com scroll
  let lastScrollTop = 0;
  window.addEventListener("scroll", () => {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > 100) {
      header.classList.add("scrolled");
    } else {
      header.classList.remove("scrolled");
    }

    lastScrollTop = scrollTop;
  });

  // Mobile menu toggle
  if (mobileToggle && navbarCollapse) {
    mobileToggle.addEventListener("click", () => {
      mobileToggle.classList.toggle("active");
    });

    // Fechar menu ao clicar em um link
    const navLinks = document.querySelectorAll(".nav-link");
    navLinks.forEach((link) => {
      link.addEventListener("click", () => {
        if (navbarCollapse.classList.contains("show")) {
          mobileToggle.classList.remove("active");
          navbarCollapse.classList.remove("show");
        }
      });
    });

    // Fechar menu ao clicar fora
    document.addEventListener("click", (e) => {
      if (
        !header.contains(e.target) &&
        navbarCollapse.classList.contains("show")
      ) {
        mobileToggle.classList.remove("active");
        navbarCollapse.classList.remove("show");
      }
    });
  }

  // Smooth scroll para links internos
  const internalLinks = document.querySelectorAll('a[href^="#"]');
  internalLinks.forEach((link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      const targetId = link.getAttribute("href");
      const targetElement = document.querySelector(targetId);

      if (targetElement) {
        const headerHeight = header.offsetHeight;
        const targetPosition = targetElement.offsetTop - headerHeight - 20;

        window.scrollTo({
          top: targetPosition,
          behavior: "smooth",
        });
      }
    });
  });

  // Animação de entrada dos elementos do header
  const brandContainer = document.querySelector(".brand-container");
  const navItems = document.querySelectorAll(".nav-item");
  const socialLinks = document.querySelectorAll(".header-social-link");

  if (brandContainer) {
    brandContainer.style.opacity = "0";
    brandContainer.style.transform = "translateY(-20px)";

    setTimeout(() => {
      brandContainer.style.transition = "all 0.6s ease";
      brandContainer.style.opacity = "1";
      brandContainer.style.transform = "translateY(0)";
    }, 100);
  }

  navItems.forEach((item, index) => {
    item.style.opacity = "0";
    item.style.transform = "translateY(-20px)";

    setTimeout(() => {
      item.style.transition = "all 0.6s ease";
      item.style.opacity = "1";
      item.style.transform = "translateY(0)";
    }, 200 + index * 100);
  });

  socialLinks.forEach((link, index) => {
    link.style.opacity = "0";
    link.style.transform = "translateY(-20px)";

    setTimeout(() => {
      link.style.transition = "all 0.6s ease";
      link.style.opacity = "1";
      link.style.transform = "translateY(0)";
    }, 400 + index * 100);
  });
});
