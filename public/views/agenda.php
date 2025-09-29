<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caio Martins - Agenda</title>

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

    <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL; ?>assets/imgs/logo/favicon-32x32.png">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/reset.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/agenda.css">

    <!-- Preconnect e DNS-Prefetch -->
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">

    <!-- Meta Tags de SEO -->
    <meta name="description" content="Agenda de Caio Martins - Será que eu estou chegando na sua cidade?">
    <meta name="keywords" content="Caio Martins, mágico, comediante, mágica com stand-up, agenda, show de mágica, comédia, stand-up comedy, apresentações na TV, SBT, Record, Globo, Comedy Central, A culpa é do Cabral, especial de stand-up, mágica e comédia, São Paulo">
    <meta name="author" content="Caio Martins">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Caio Martins - Agenda">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://caiomartinsomagico.com/agenda">
    <meta property="og:image" content="https://caiomartinsomagico.com/imgs/home/caio1.webp">
    <meta property="og:description" content="Agenda de Caio Martins - Será que eu estou chegando na sua cidade?">
</head>



<body>
    <!--header-->
    <?php include 'layouts/header.php'; ?>

    <!-- AGENDA -->
    <section class="container agenda-section mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <h1 class="titulo-agenda">AGENDA - CAIO MARTINS</h1>
                <h2 class="subtitulo-agenda">Descubra onde será minha próxima apresentação e adquira seus ingressos!</h2>
            </div>
        </div>

        <div class="row mt-4 align-items-center">
            <!-- Imagem do Caio -->
            <div class="col-lg-4 d-flex justify-content-center">
                <img src="<?php echo BASE_URL; ?>assets/imgs/agenda/caio-agenda.webp" alt="Foto do Caio Martins em um banquinho" class="img-agenda">
            </div>

            <!-- Lista de Eventos -->
            <div class="col-lg-8">
                <div class="row row-cols-1 row-cols-md-2 g-4" id="events-container">
                    <!-- Eventos serão inseridos aqui dinamicamente -->
                </div>
            </div>
        </div>
    </section>

    <!--Footer-->
    <?php include 'layouts/footer.php'; ?>
    <!--Scripts Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <!--Scripts-->
    <script>
        const BASE_URL = "<?php echo BASE_URL; ?>";
    </script>
    <script src="<?php echo BASE_URL; ?>assets/js/global.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/agenda.js"></script>
</body>


</html>