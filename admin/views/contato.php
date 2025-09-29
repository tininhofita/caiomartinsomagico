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
    <title>Contatos</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>admin/assets/css/contato.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="/assets/imgs/logo/logo-tininho.png">
</head>

<body class="contatosAdmin">

    <!-- Header -->
    <?php include 'layouts/header-admin.php'; ?>
    <!-- Nav -->
    <?php include 'layouts/nav-admin.php'; ?>

    <main>
        <h1 class="tituloContatos">Contatos Recebidos</h1>
        <div class="table-container">
            <table class="contato-table">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Assunto</th>
                        <th>Descrição</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody id="contact-list">
                    <!-- Contatos serão carregados dinamicamente -->
                </tbody>
            </table>
        </div>
    </main>

    <!-- Modal de Resposta -->
    <div id="responderModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <h2>Responder Contato</h2>
            <form id="responderForm">
                <div>
                    <label for="responderEmail">Para:</label>
                    <input type="email" id="responderEmail" name="email" readonly>
                </div>
                <div>
                    <label for="responderAssunto">Assunto:</label>
                    <input type="text" id="responderAssunto" name="assunto" readonly>
                </div>
                <div>
                    <label for="responderMensagem">Mensagem:</label>
                    <textarea id="responderMensagem" name="mensagem" rows="5"></textarea>
                </div>
                <button type="submit" class="btn-vermelho">Enviar</button>
            </form>
        </div>
    </div>


    <!-- Footer -->
    <?php include 'layouts/footer-admin.php'; ?>

    <script src="/admin/assets/javascript/contato.js"></script>
</body>

</html>