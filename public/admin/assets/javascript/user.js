document.addEventListener("DOMContentLoaded", () => {
  // Função para listar usuários
  fetch("/admin/usuarios/listar")
    .then((response) => response.json())
    .then((users) => {
      const tableBody = document.querySelector(".tabela_users tbody");
      users.forEach((user) => {
        const row = document.createElement("tr");
        row.innerHTML = `
                      <td>${user.id}</td>
                      <td>${user.name}</td>
                      <td>${user.username}</td>
                      <td>${user.email}</td>
                      <td class="acao">
                          <button class="btn-vermelho" onclick="editUser(${user.id}, '${user.name}', '${user.username}', '${user.email}')">Editar</button>
                          <button class="btn-preto" onclick="deleteUser(${user.id})">Excluir</button>
                      </td>
                  `;
        tableBody.appendChild(row);
      });
    })
    .catch((error) => console.error("Erro ao buscar usuários:", error));
});

// Função para adicionar ou atualizar usuário
document
  .getElementById("user-form")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    const formData = new FormData(this);
    const userId = formData.get("id");

    const endpoint = userId
      ? "/admin/usuarios/editar"
      : "/admin/usuarios/adicionar"; // Verifica se é uma edição ou adição

    fetch(endpoint, {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          alert(
            userId
              ? "Usuário atualizado com sucesso!"
              : "Usuário adicionado com sucesso!"
          );
          window.location.reload();
        } else {
          alert("Erro: " + data.error);
        }
      })
      .catch((error) => {
        console.error("Erro ao processar usuário:", error);
        alert("Erro ao processar usuário.");
      });
  });

// Função para excluir usuário
function deleteUser(userId) {
  if (confirm("Tem certeza que deseja excluir este usuário?")) {
    fetch(`/admin/usuarios/excluir`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ id: userId }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          alert("Usuário excluído com sucesso!");
          window.location.reload();
        } else {
          alert("Erro ao excluir usuário: " + data.error);
        }
      })
      .catch((error) => {
        console.error("Erro ao excluir usuário:", error);
        alert("Erro ao excluir usuário.");
      });
  }
}

// Função para editar usuário
function editUser(userId, name, username, email) {
  const form = document.getElementById("user-form");
  form.elements["id"].value = userId; // Preenche o ID oculto
  form.elements["name"].value = name; // Preenche o campo nome
  form.elements["username"].value = username; // Preenche o nome de usuário
  form.elements["email"].value = email; // Preenche o email
  form.elements["password"].value = ""; // Limpa o campo de senha
  form.querySelector("button[type='submit']").textContent = "Atualizar Usuário"; // Altera o texto do botão
}
