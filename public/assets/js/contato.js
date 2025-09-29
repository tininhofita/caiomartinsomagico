document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("contatoSite");

  form.addEventListener("submit", async function (e) {
    e.preventDefault();

    try {
      const token = await grecaptcha.enterprise.execute(
        "6Lcf1oYqAAAAAAjPLuZLsnDvhPJA7dpS7UesUE44",
        { action: "submit_form_contato" }
      );

      const formData = new FormData(form);
      formData.append("recaptchaToken", token);

      const response = await fetch("/contato/enviar", {
        method: "POST",
        body: formData,
      });

      const data = await response.json();
      if (data.success) {
        alert(data.message || "Mensagem enviada com sucesso!");
        form.reset();
        document.getElementById("descricao-counter").textContent =
          "500 caracteres restantes";
      } else {
        alert(
          "Erro: " + (data.message || "Ocorreu um erro ao enviar a mensagem.")
        );
      }
    } catch (error) {
      alert("Erro ao enviar mensagem. Por favor, tente novamente mais tarde.");
    }
  });

  const descricao = document.getElementById("descricao");
  const descricaoCounter = document.getElementById("descricao-counter");

  descricao.addEventListener("input", () => {
    const maxLength = 500;
    const currentLength = descricao.value.length;
    const remaining = maxLength - currentLength;
    descricaoCounter.textContent = `${remaining} caracteres restantes`;

    if (currentLength > maxLength) {
      descricao.value = descricao.value.slice(0, maxLength);
    }
  });
});
