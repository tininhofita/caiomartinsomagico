<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /admin');
    exit;
}

require_once __DIR__ . '/../../config/db_config.php';
$mysqli = getDatabaseConnection();

// Query para buscar a quantidade de shows realizados
$result = $mysqli->query("SELECT COUNT(*) AS showsRealizados FROM agenda WHERE date < CURDATE()");
$showsRealizados = $result->fetch_assoc()['showsRealizados'] ?? 0;

// Query para buscar a quantidade de shows para fazer
$result = $mysqli->query("SELECT COUNT(*) AS showsParaFazer FROM agenda WHERE date >= CURDATE()");
$showsParaFazer = $result->fetch_assoc()['showsParaFazer'] ?? 0;

// Query para buscar a quantidade de contatos recebidos
$result = $mysqli->query("SELECT COUNT(*) AS contatosRecebidos FROM contatos");
$contatosRecebidos = $result->fetch_assoc()['contatosRecebidos'] ?? 0;

$mysqli->close();

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>admin/assets/css/menu.css">
    <link rel="icon" type="image/x-icon" href="/assets/imgs/logo/logo-tininho.png">
</head>

<body>

    <!--header-->
    <?php include 'layouts/header-admin.php'; ?>
    <!-- Nav -->
    <?php include 'layouts/nav-admin.php'; ?>
    <main>
        <div class="stats-container">
            <div class="stats-card">
                <div class="stats-title">Shows Realizados</div>
                <div class="stats-number">
                    <?php echo $showsRealizados; ?>
                </div>
            </div>
            <div class="stats-card">
                <div class="stats-title">Shows para Fazer</div>
                <div class="stats-number">
                    <?php echo $showsParaFazer; ?>
                </div>
            </div>
            <div class="stats-card">
                <div class="stats-title">Contatos Recebidos</div>
                <div class="stats-number">
                    <?php echo $contatosRecebidos; ?>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <?php include 'layouts/footer-admin.php'; ?>

    <!--Scripts Bootstrap-->

    <!-- Scripts Próprio -->

</body>

</html>