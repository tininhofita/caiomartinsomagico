<?php
// Verifica se o nome completo está definido
if (isset($_SESSION['name'])) {
    // Converte a primeira letra para maiúscula, considerando caracteres multibyte
    $name = mb_convert_case($_SESSION['name'], MB_CASE_TITLE, "UTF-8");
} else {
    $name = 'Visitante';
}
?>


<!-- Link para o CSS específico do header -->
<link rel="stylesheet" href="/admin/assets/css/layouts/header.css">

<header class="top-bar">
    <div class="top-bar-content">
        <!-- Logo -->
        <div class="logo-container">
            <img src="/assets/imgs/logo/logo-tininho.png" alt="Logo Caio Martins" class="top-bar-logo">
        </div>
        <!-- Saudação -->
        <div class="account-info">
            <span class="user-name">Salve, <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>!</span>
        </div>
        <!-- Botão de logout -->
        <nav>
            <a href="/admin/auth/logout" class="logout-btn">Sair</a>
        </nav>
    </div>
</header>