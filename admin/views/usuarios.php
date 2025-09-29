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
    <title>Usuários</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>admin/assets/css/usuarios.css">
    <link rel="icon" type="image/x-icon" href="/assets/imgs/logo/logo-tininho.png">
</head>

<body class="menuAdmin">
    <!-- Header -->
    <?php include 'layouts/header-admin.php'; ?>
    <!-- Nav -->
    <?php include 'layouts/nav-admin.php'; ?>

    <main>
        <h1 class="tituloMenu">Gerenciamento de Usuários</h1>

        <!-- Formulário para adicionar usuários -->
        <section class="form-section">
            <h2>Adicionar Usuário</h2>
            <form class="form-add-user" id="user-form" method="post">
                <input type="hidden" name="id" value=""> <!-- Campo oculto para ID -->
                <div class="form-group">
                    <input type="text" name="name" placeholder="Nome" autocomplete="name" required>
                </div>
                <div class="form-group">
                    <input type="text" name="username" placeholder="Login" autocomplete="username" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="E-mail" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Senha" required autocomplete="current-password">
                </div>
                <button type="submit" class="btn-principal">Salvar Usuário</button>
            </form>
        </section>

        <!-- Tabela de Usuários -->
        <section class="table-section">
            <h2>Usuários Cadastrados</h2>
            <table class="tabela_users">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Login</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dados serão inseridos dinamicamente -->
                </tbody>
            </table>
        </section>
    </main>

    <!-- Footer -->
    <?php include 'layouts/footer-admin.php'; ?>
    <!-- Meus Scripts -->
    <script src="/admin/assets/javascript/user.js"></script>
</body>

</html>