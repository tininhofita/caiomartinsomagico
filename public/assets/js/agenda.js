// Função para renderizar eventos na página da agenda
function renderEvents() {
  fetch("/agenda/events")
    .then((response) => response.json())
    .then((events) => {
      const eventsContainer = document.querySelector("#events-container");
      eventsContainer.innerHTML = ""; // Limpa eventos antigos

      if (events.length === 0) {
        eventsContainer.innerHTML = `
          <div class="no-events">
            <div class="no-events-icon">
              <i class="bi bi-calendar-x"></i>
            </div>
            <h3>Nenhum evento agendado</h3>
            <p>Volte em breve para conferir as novidades!</p>
          </div>
        `;
        return;
      }

      events.forEach((event, index) => {
        const eventDate = new Date(event.date + "T12:00:00");
        const formattedDate = eventDate.toLocaleDateString("pt-BR", {
          day: "2-digit",
          month: "long",
          year: "numeric",
        });

        const day = eventDate.getDate();
        const month = eventDate.toLocaleDateString("pt-BR", { month: "short" });

        const eventHTML = `
          <div class="event-card" data-aos="fade-up" data-aos-delay="${
            (index + 1) * 100
          }">
            <div class="event-date">
              <span class="event-day">${day}</span>
              <span class="event-month">${month}</span>
            </div>
            <div class="event-content">
              <h3 class="event-title">${event.venue}</h3>
              <div class="event-location">
                <i class="bi bi-geo-alt-fill"></i>
                <span>${event.city}</span>
              </div>
              <div class="event-actions">
                ${
                  event.link
                    ? `
                  <a href="${event.link}" target="_blank" class="event-link">
                    <i class="bi bi-ticket-perforated"></i>
                    Comprar Ingressos
                  </a>
                `
                    : `
                  <span class="event-link disabled">
                    <i class="bi bi-info-circle"></i>
                    Em Breve
                  </span>
                `
                }
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
        <div class="error-events">
          <div class="error-icon">
            <i class="bi bi-exclamation-triangle"></i>
          </div>
          <h3>Erro ao carregar eventos</h3>
          <p>Por favor, tente novamente mais tarde.</p>
        </div>
      `;
    });
}

// Garantir que renderEvents seja chamado quando o DOM estiver pronto
document.addEventListener("DOMContentLoaded", renderEvents);
