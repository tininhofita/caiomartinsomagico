document
  .getElementById("login-form")
  .addEventListener("submit", async function (e) {
    e.preventDefault();

    const username = document.getElementById("username").value.trim();
    const password = document.getElementById("password").value.trim();

    const formData = {
      username: username,
      password: password,
    };

    try {
      const response = await fetch("/admin/auth/login", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(formData),
      });

      const data = await response.json();

      if (data.success) {
        // Usuário autenticado com sucesso
        window.location.href = "/admin/menu";
      } else {
        // Exibe mensagem de erro
        const errorDiv = document.getElementById("login-error");
        errorDiv.textContent = data.error;
        errorDiv.style.display = "block";
      }
    } catch (error) {
      console.error("Erro ao processar o login:", error);
    }
  });
