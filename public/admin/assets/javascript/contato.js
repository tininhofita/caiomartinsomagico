document.addEventListener("DOMContentLoaded", function () {
  fetch("/admin/contatos/fetch")
    .then((response) => response.json())
    .then((data) => {
      if (data.error) {
        alert(data.error);
        return;
      }

      const contactList = document.getElementById("contact-list");
      if (!contactList) {
        console.error("Elemento contact-list não encontrado.");
        return;
      }

      contactList.innerHTML = "";

      data.forEach((contact) => {
        const row = document.createElement("tr");
        row.className = "contact-row";

        // Formatação da data para dd/mm/aaaa
        const formattedDate = new Date(contact.data_contato).toLocaleDateString(
          "pt-BR"
        );

        row.innerHTML = `
            <td class="contact-date">${formattedDate}</td>
            <td class="contact-name">${contact.nome}</td>
            <td class="contact-telefone">${contact.telefone}</td>
            <td class="contact-email">${contact.email}</td>
            <td class="contact-subject">${contact.assunto}</td>
            <td class="contact-message">
                <div class="message-preview">${contact.descricao.slice(
                  0,
                  90
                )}...</div>
                <button class="expand-button">Expandir</button>
                <div class="message-full" style="display: none;">${
                  contact.descricao
                }</div>
            </td>
            <td>
                <button class="btn-vermelho reply-button">
                    <i class="fas fa-reply"></i> Responder
                </button>
                <button class="btn-preto delete-button" data-contact-id="${
                  contact.id
                }">
                    <i class="fas fa-trash"></i> Excluir
                </button>
            </td>
          `;

        // Função para expandir/reduzir a descrição
        const expandButton = row.querySelector(".expand-button");
        const messagePreview = row.querySelector(".message-preview");
        const messageFull = row.querySelector(".message-full");

        if (expandButton && messagePreview && messageFull) {
          expandButton.addEventListener("click", function () {
            const isExpanded = messageFull.style.display === "block";
            messageFull.style.display = isExpanded ? "none" : "block";
            messagePreview.style.display = isExpanded ? "block" : "none";
            expandButton.textContent = isExpanded ? "Expandir" : "Reduzir";
            row.style.height = "auto"; // Permite ajuste dinâmico
          });
        } else {
          console.error("Erro nos elementos de expansão da mensagem.");
        }

        // Função para excluir contato
        const deleteButton = row.querySelector(".delete-button");
        if (deleteButton) {
          deleteButton.addEventListener("click", () => {
            const contactId = contact.id;
            if (confirm("Tem certeza que deseja excluir este contato?")) {
              fetch("/admin/contatos/excluir", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ id: contactId }),
              })
                .then((response) => response.json())
                .then((data) => {
                  if (data.success) {
                    alert("Contato excluído com sucesso!");
                    row.remove();
                  } else {
                    alert("Erro ao excluir contato: " + data.error);
                  }
                })
                .catch((error) =>
                  console.error("Erro ao excluir contato:", error)
                );
            }
          });
        } else {
          console.error("Botão de excluir não encontrado.");
        }

        contactList.appendChild(row);
      });

      // Configuração do modal de resposta
      const responderModal = document.getElementById("responderModal");
      const closeModalButton = responderModal.querySelector(".close-button");
      const responderForm = document.getElementById("responderForm");

      // Abre o modal de resposta
      const abrirModal = (email, assunto) => {
        responderModal.style.display = "block";
        document.getElementById("responderEmail").value = email;
        document.getElementById("responderAssunto").value = `Re: ${assunto}`;
      };

      // Fecha o modal
      closeModalButton.addEventListener("click", () => {
        responderModal.style.display = "none";
      });

      // Enviar a resposta
      responderForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch("/admin/contatos/responder", {
          method: "POST",
          body: formData,
        })
          .then((response) => response.text())
          .then((data) => {
            alert(data);
            responderModal.style.display = "none";
          })
          .catch((error) => {
            console.error("Erro ao enviar resposta:", error);
          });
      });

      // Adiciona eventos de clique ao botão de resposta
      const replyButtons = document.querySelectorAll(".reply-button");
      replyButtons.forEach((button) => {
        button.addEventListener("click", () => {
          const email = button
            .closest("tr")
            .querySelector(".contact-email").textContent;
          const assunto = button
            .closest("tr")
            .querySelector(".contact-subject").textContent;
          abrirModal(email, assunto);
        });
      });
    })
    .catch((error) => console.error("Erro ao carregar os contatos:", error));
});
