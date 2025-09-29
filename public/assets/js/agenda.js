// Função para renderizar eventos na página da agenda
function renderEvents() {
  fetch("/agenda/events")
    .then((response) => response.json())
    .then((events) => {
      const eventsContainer = document.querySelector("#events-container");
      eventsContainer.innerHTML = ""; // Limpa eventos antigos

      if (events.length === 0) {
        eventsContainer.innerHTML = `
                    <p class="text-center text-light">Nenhum evento agendado no momento. Volte em breve para conferir as novidades!</p>
                `;
        return;
      }

      events.forEach((event) => {
        const eventDate = new Date(event.date + "T12:00:00").toLocaleDateString(
          "pt-BR",
          {
            day: "2-digit",
            month: "long",
            year: "numeric",
          }
        );
        const eventHTML = `
                    <div class="col">
                        <div class="card-show h-100">
                            <div class="data-show">
                                <h5>${eventDate}</h5>
                                <h6>${event.city}</h6>
                            </div>
                            <div class="info-show">
                                <p class="nome-show">${event.venue}</p>
                                <a href="${event.link}" target="_blank" class="btn-show">Adquira seus ingressos</a>
                            </div>
                        </div>
                    </div>
                `;
        eventsContainer.innerHTML += eventHTML;
      });
    })
    .catch((error) => {
      console.error("Erro ao buscar eventos:", error);
      const eventsContainer = document.querySelector("#events-container");
      eventsContainer.innerHTML = `
                <p class="text-center text-danger">Erro ao carregar eventos. Por favor, tente novamente mais tarde.</p>
            `;
    });
}

// Garantir que renderEvents seja chamado quando o DOM estiver pronto
document.addEventListener("DOMContentLoaded", renderEvents);
