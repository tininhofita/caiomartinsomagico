<?php
// Definir BASE_URL caso não esteja definido
if (!defined('BASE_URL')) {
    define('BASE_URL', '/');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Caio Martins</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/loginAdmin.css">
    <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL; ?>assets/imgs/logo/logo-tininho.png">
</head>

<body class="loginAdmin">
    <main class="login-container">
        <!-- Seção de cabeçalho: logo e informações -->
        <header class="login-header">
            <img src="<?php echo BASE_URL; ?>assets/imgs/logo/logo-tininho.png" alt="Logo Tininho Fita" class="logo">
            <h1>Login</h1>
            <h2>Administração - <a href="http://www.caiomartinsomagico.com" target="_blank">Caio Martins</a></h2>
            <h3>Gerencie seu conteúdo facilmente.</h3>
        </header>

        <!-- Seção de formulário -->
        <section class="login-form-section">
            <form id="login-form">
                <div class="form-group">
                    <label for="username">Usuário</label>
                    <input type="text" id="username" placeholder="Digite seu usuário" autocomplete="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" id="password" placeholder="Digite sua senha" autocomplete="current-password" required>
                </div>
                <button type="submit">Entrar</button>
            </form>
            <p id="login-error" style="display:none;">Erro: Usuário ou senha inválidos.</p>
        </section>

        <!-- Rodapé -->
        <footer class="copy">
            Desenvolvido por <a href="https://www.tininhofita.com" target="_blank">Tininho Fita</a>
        </footer>
    </main>
    <script src="<?php echo BASE_URL; ?>assets/js/login.js"></script>
</body>



</html>