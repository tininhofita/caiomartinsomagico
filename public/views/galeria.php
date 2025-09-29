<?php
// Inclui o arquivo de configuração principal
require_once __DIR__ . '/../../config/config.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caio Martins - Galeria</title>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5FMX6G8E9W"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-5FMX6G8E9W');
    </script>

    <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL; ?>public/assets/imgs/logo/favicon-32x32.png">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/assets/css/reset.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/assets/css/galeria.css">

    <!-- Preconnect e DNS-Prefetch -->
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">

    <!-- Meta Tags de SEO -->
    <meta name="description" content="Um pouco da minha história, seja bem vindo a minha galeria">
    <meta name="keywords" content="Caio Martins, mágico, comediante, mágica com stand-up, agenda, show de mágica, comédia, stand-up comedy, apresentações na TV, SBT, Record, Globo, Comedy Central, A culpa é do Cabral, especial de stand-up, mágica e comédia, São Paulo">
    <meta name="author" content="Caio Martins">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Caio Martins - Galeria">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://caiomartinsomagico.com/galeria">
    <meta property="og:image" content="https://caiomartinsomagico.com/imgs/home/caio1.webp">
    <meta property="og:description" content="Um pouco da minha história, seja bem vindo a minha galeria">
</head>

<body>
    <!--header-->
    <?php include BASE_PATH . 'public/layouts/header.php'; ?>

    <div class="linha_decorativa"></div>

    <!-- GALERIA 1-->
    <section class="galeria">
        <h2 class="titulo-secundario">Gravação do especial de comédia - Nesse Nipe</h2>
        <p class="galeria_descricao"> O primeiro especial de mágica com stand-up comedy</p>
        <div class="galeria_container">
            <div class="card">
                <img src="<?php echo BASE_URL; ?>public/assets/imgs/galeria/nesseNipe/nesse_nipe1.webp"
                    alt="Fotos da gravação do especial de comédia do Caio Martins - Nesse Nipe">
            </div>
            <div class="card">
                <img src="<?php echo BASE_URL; ?>public/assets/imgs/galeria/nesseNipe/nesse_nipe2.webp"
                    alt="Fotos da gravação do especial de comédia do Caio Martins - Nesse Nipe">
            </div>
            <div class="card">
                <img src="<?php echo BASE_URL; ?>public/assets/imgs/galeria/nesseNipe/nesse_nipe3.webp"
                    alt="Fotos da gravação do especial de comédia do Caio Martins - Nesse Nipe">
            </div>
            <div class="card">
                <img src="<?php echo BASE_URL; ?>public/assets/imgs/galeria/nesseNipe/nesse_nipe4.webp"
                    alt="Fotos da gravação do especial de comédia do Caio Martins - Nesse Nipe">
            </div>
            <div class="card">
                <img src="<?php echo BASE_URL; ?>public/assets/imgs/galeria/nesseNipe/nesse_nipe5.webp"
                    alt="Fotos da gravação do especial de comédia do Caio Martins - Nesse Nipe">
            </div>
        </div>
    </section>


    <div class="linha_decorativa"></div>

    <!-- GALERIA 2-->
    <section class="galeria">
        <h2 class="titulo-secundario">Ensaio -Segredo Revelado</h2>
        <p class="galeria_descricao">Ensaio para o novo show - Segredo Revelado</p>
        <div class="galeria_container">
            <div class="card">
                <img src="<?php echo BASE_URL; ?>public/assets/imgs/galeria/segredoRevelado/segredo_revelado.webp" alt="Fotos do ensaio do especial de comédia do Caio Martins - Segredo Revelado">
            </div>
            <div class="card">
                <img src="<?php echo BASE_URL; ?>public/assets/imgs/galeria/segredoRevelado/segredo_revelado1.webp" alt="Fotos do ensaio do especial de comédia do Caio Martins - Segredo Revelado">
            </div>
            <div class="card">
                <img src="<?php echo BASE_URL; ?>public/assets/imgs/galeria/segredoRevelado/segredo_revelado2.webp" alt="Fotos do ensaio do especial de comédia do Caio Martins - Segredo Revelado">
            </div>
        </div>
    </section>

    <div class="linha_decorativa"></div>

    <!--Footer-->
    <?php include BASE_PATH . 'public/layouts/footer.php'; ?>


    <!--Scripts Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <!--Scripts Própio-->
    <script src="<?php echo BASE_URL; ?>public/assets/js/global.js"></script>
    <!--Scripts externos-->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>