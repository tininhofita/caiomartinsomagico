<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /admin');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>admin/assets/css/agenda.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="/assets/imgs/logo/logo-tininho.png">
</head>

<body>
    <!-- Header -->
    <?php include 'layouts/header-admin.php'; ?>
    <!-- Nav -->
    <?php include 'layouts/nav-admin.php'; ?>

    <main>
        <h1 class="tituloAgenda">Gerenciar Agenda</h1>

        <!-- Formulário -->
        <section class="form-section">
            <h2>Adicionar Evento</h2>
            <form id="event-form">
                <div class="form-group">
                    <label for="date">
                        <i class="fas fa-calendar-alt"></i> Data:
                    </label>
                    <input type="date" id="date" name="date" required>
                </div>
                <div class="form-group">
                    <label for="city">
                        <i class="fas fa-city"></i> Cidade:
                    </label>
                    <input type="text" id="city" name="city" placeholder="Ex: São Paulo" required>
                </div>
                <div class="form-group">
                    <label for="venue">
                        <i class="fas fa-map-marker-alt"></i> Local:
                    </label>
                    <input type="text" id="venue" name="venue" placeholder="Ex: Teatro Municipal" required>
                </div>
                <div class="form-group">
                    <label for="link">
                        <i class="fas fa-link"></i> Link para Ingressos:
                    </label>
                    <input type="url" id="link" name="link" placeholder="Ex: https://meuingresso.com">
                </div>
                <button type="submit" class="btn-principal">Salvar Evento</button>
            </form>
        </section>

        <!-- Lista de Eventos -->
        <section class="events-section">
            <h2>Eventos Cadastrados</h2>
            <div id="events-list">
                <!-- Eventos carregados dinamicamente -->
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include 'layouts/footer-admin.php'; ?>

    <script src="/admin/assets/javascript/agenda.js"></script>
</body>

</html>