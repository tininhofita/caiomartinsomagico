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
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
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



    <!-- Seção de Eventos -->
    <section class="events-section">
        <div class="container">
            <div class="events-header" data-aos="fade-up">
                <h2 class="events-title">Próximos Shows</h2>
                <p class="events-subtitle">Confira onde será minha próxima apresentação</p>
            </div>

            <div class="events-grid" id="events-container">
                <!-- Eventos serão inseridos aqui dinamicamente -->
            </div>
        </div>
    </section>

    <!-- Seção de Informações -->
    <section class="info-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="bi bi-calendar-event"></i>
                        </div>
                        <h3>Shows Regulares</h3>
                        <p>Apresentações semanais em casas de show e teatros</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <h3>Nacional e internacional</h3>
                        <p>Apresentações em todo o Brasil e no exterior</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="bi bi-ticket-perforated"></i>
                        </div>
                        <h3>Ingressos</h3>
                        <p>Compre seus ingressos online com segurança</p>
                    </div>
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
    <!--Scripts externos-->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>


</html>