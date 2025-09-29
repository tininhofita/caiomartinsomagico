// Agenda Admin

// Variável global para guardar o ID do evento que está sendo editado
let editingEventId = null;

// Carrega os eventos do backend quando a DOM estiver pronta
document.addEventListener("DOMContentLoaded", loadEvents);

// Função para carregar eventos
function loadEvents() {
  fetch("/admin/agenda/listar")
    .then((response) => response.json())
    .then((events) => {
      const listElement = document.getElementById("events-list");
      listElement.innerHTML = "";
      events.forEach((event) => {
        const eventDate = event.date
          .split(" ")[0]
          .split("-")
          .reverse()
          .join("/");
        listElement.innerHTML += `
          <div class="event-item">
              <div class="event-date">
                  <i class="fas fa-calendar-alt"></i>: ${eventDate}
              </div>
              <div class="event-city">
                  <i class="fas fa-city"></i>: ${event.city}
              </div>
              <div class="event-venue">
                  <i class="fas fa-map-marker-alt"></i>: ${event.venue}
              </div>
              <div class="event-link">
                  <i class="fas fa-ticket-alt"></i>: <a href="${event.link}" target="_blank">Visitar Link</a>
              </div>
              <div class="event-actions">
                  <button class="btn-vermelho" onclick="editEvent(${event.id})">
                       Editar
                  </button>
                  <button class="btn-preto" onclick="removeEvent(${event.id})">
                      Remover
                  </button>
              </div>
          </div>
      `;
      });
    })
    .catch((error) => console.error("Erro ao carregar eventos:", error));
}

// Função de manipulação do evento de adição de eventos
function handleAddEvent(e) {
  e.preventDefault();
  const event = {
    id: editingEventId,
    date: document.getElementById("date").value,
    city: document.getElementById("city").value,
    venue: document.getElementById("venue").value,
    link: document.getElementById("link").value || "#",
  };

  if (editingEventId) {
    updateEvent(event);
  } else {
    addEvent(event);
  }
}

// Escuta o evento de submit do formulário
document
  .getElementById("event-form")
  .addEventListener("submit", handleAddEvent);

// Função para adicionar eventos via AJAX
function addEvent(event) {
  fetch("/admin/agenda/adicionar", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(event),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        loadEvents();
        resetForm();
        alert("Evento adicionado com sucesso!");
      } else {
        alert("Erro ao adicionar evento: " + data.error);
      }
    })
    .catch((error) => {
      console.error("Erro ao adicionar evento:", error);
      alert("Erro ao adicionar evento.");
    });
}

// Função para atualizar um evento existente
function updateEvent(event) {
  fetch("/admin/agenda/editar", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(event),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        loadEvents();
        resetForm();
        alert("Evento atualizado com sucesso!");
      } else {
        alert("Erro ao atualizar evento: " + data.error);
      }
    })
    .catch((error) => {
      console.error("Erro ao atualizar evento:", error);
      alert("Erro ao atualizar evento.");
    });
}

// Função para editar evento
function editEvent(eventId) {
  fetch(`/admin/agenda/detalhes`, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ id: eventId }),
  })
    .then((response) => response.json())
    .then((event) => {
      if (event.error) {
        console.error("Erro ao carregar evento:", event.error);
        alert("Erro ao carregar evento.");
        return;
      }

      editingEventId = event.id;

      // Preenche o formulário com os dados do evento
      document.getElementById("date").value = event.date;
      document.getElementById("city").value = event.city;
      document.getElementById("venue").value = event.venue;
      document.getElementById("link").value = event.link;

      // Atualiza o título do formulário para "Editar Evento"
      document.querySelector(".form-section h2").textContent = "Editar Evento";

      // Altera o texto do botão de submissão
      document.querySelector("#event-form button[type='submit']").textContent =
        "Salvar Alterações";
    })
    .catch((error) => {
      console.error("Erro ao carregar evento:", error);
    });
}

// Função para remover eventos via AJAX
function removeEvent(eventId) {
  if (confirm("Tem certeza que deseja remover este evento?")) {
    fetch(`/admin/agenda/remover`, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ id: eventId }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          loadEvents();
          alert("Evento removido com sucesso!");
        } else {
          alert("Erro ao remover evento: " + data.error);
        }
      })
      .catch((error) => {
        console.error("Erro ao remover evento:", error);
        alert("Erro ao remover evento.");
      });
  }
}

// Função para limpar o formulário e resetar o estado de edição
function resetForm() {
  document.getElementById("event-form").reset();
  editingEventId = null;

  // Atualiza o título do formulário para "Adicionar Evento"
  document.querySelector(".form-section h2").textContent = "Adicionar Evento";

  // Altera o texto do botão de submissão
  document.querySelector("#event-form button[type='submit']").textContent =
    "Salvar Evento";
}
