document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("bannerForm");
  const previewContainer = document.getElementById("bannerPreview");
  const fileField = document.getElementById("bannerImage");
  const positionField = document.getElementById("bannerPosition");
  const altTextField = document.getElementById("bannerAltText");

  document.querySelectorAll(".btn-adicionar").forEach((button) => {
    button.addEventListener("click", function () {
      const position = this.getAttribute("data-position");
      const card = this.closest(".banner-card");

      if (card.querySelector(".banner-image")) {
        alert(
          "Já existe um banner nessa posição. Remova antes de adicionar um novo."
        );
        return;
      }

      positionField.value = position;
      form.style.display = "block";
    });
  });

  document.querySelectorAll(".btn-preto").forEach((button) => {
    button.addEventListener("click", function () {
      const bannerId = this.getAttribute("data-id");

      if (!bannerId) {
        alert("ID do banner não encontrado!");
        return;
      }

      if (confirm("Tem certeza que deseja remover este banner?")) {
        fetch("/admin/banner/delete", {
          method: "POST",
          body: JSON.stringify({ id: bannerId }),
          headers: { "Content-Type": "application/json" },
        })
          .then((response) => response.json())
          .then((data) => {
            if (data.success) {
              alert("Banner removido com sucesso!");
              location.reload(); // Atualiza a página para refletir as mudanças
            } else {
              alert("Erro ao remover o banner: " + data.message);
            }
          })
          .catch((error) => console.error("Erro ao remover o banner:", error));
      }
    });
  });

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    const file = fileField.files[0];
    if (!file) {
      alert("Por favor, selecione uma imagem.");
      return;
    }

    const img = new Image();
    img.onload = function () {
      if (img.width !== 1963 || img.height !== 926) {
        alert("A imagem precisa ter as dimensões 1963x926.");
        return;
      }

      const formData = new FormData(form);

      fetch("/admin/banner/upload", {
        method: "POST",
        body: formData,
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            alert("Banner atualizado com sucesso!");
            location.reload();
          } else {
            alert(`Erro: ${data.message || "Erro ao atualizar o banner."}`);
          }
        })
        .catch((error) => console.error("Erro ao fazer upload:", error));
    };

    img.src = URL.createObjectURL(file);
  });
});
