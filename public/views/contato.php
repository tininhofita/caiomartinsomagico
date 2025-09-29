<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caio Martins - Contato</title>

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
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6Lcf1oYqAAAAAAjPLuZLsnDvhPJA7dpS7UesUE44"></script>


    <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL; ?>assets/imgs/logo/favicon-32x32.png">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/reset.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/contato.css">

    <!-- Preconnect e DNS-Prefetch -->
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">

    <!-- Meta Tags de SEO -->
    <meta name="description" content="Quer mais risadas e mágicas na sua vida? Contrate nosso show.">
    <meta name="keywords" content="Caio Martins, mágico, comediante, mágica com stand-up, agenda, show de mágica, comédia, stand-up comedy, apresentações na TV, SBT, Record, Globo, Comedy Central, A culpa é do Cabral, especial de stand-up, mágica e comédia, São Paulo">
    <meta name="author" content="Caio Martins">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Caio Martins - Contato">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://caiomartinsomagico.com/contato">
    <meta property="og:image" content="https://caiomartinsomagico.com/imgs/home/caio1.webp">
    <meta property="og:description" content="Quer mais risadas e mágicas na sua vida? Contrate nosso show.">
</head>

<body>
    <!--header-->
    <?php include 'layouts/header.php'; ?>


    <section class="container my-5" id="contato">
        <h2 class="text-center titulo-geral mb-4" data-aos="fade-up">Contate-nos para Shows</h2>
        <form id="contatoSite" action="/contato/enviar" method="POST" data-aos="fade-up" data-aos-delay="200">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Somente Números" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" required>
            </div>
            <div class="mb-3">
                <label for="assunto" class="form-label">Assunto</label>
                <input type="text" class="form-control" id="assunto" name="assunto" placeholder="Interesse no show do Caio Martins" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="3" maxlength="500" required></textarea>
                <!-- Contador de caracteres -->
                <small id="descricao-counter" class="form-text" style="color: white;">500 caracteres restantes</small>
            </div>
            <!-- Campo oculto para armazenar o token do reCAPTCHA -->
            <input type="hidden" id="recaptchaToken" name="recaptchaToken">
            <button type="submit" class="btn btn-redirecionar">Enviar Mensagem</button>
        </form>
    </section>

    <div class="linha_decorativa"></div>


    <div class="container galeria-imagens" id="galeria-imagens">
        <img src="<?php echo BASE_URL; ?>assets/imgs/contato/nesse_nipe5.webp" alt="Caio durante seu show solo de Stand-up Magic" class="img-fluid" data-aos="fade-up" data-aos-delay="100">
        <img src="<?php echo BASE_URL; ?>assets/imgs/contato/nesse_nipe2.webp" alt="Caio durante seu show solo de Stand-up Magic" class="img-fluid" data-aos="fade-up" data-aos-delay="300">
        <img src="<?php echo BASE_URL; ?>assets/imgs/contato/nesse_nipe4.webp" alt="Caio durante seu show solo de Stand-up Magic" class="img-fluid" data-aos="fade-up" data-aos-delay="500">
    </div>

    <div class="linha_decorativa"></div>

    <!--Footer-->
    <?php include 'layouts/footer.php'; ?>

    <!--Scripts Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <!--Scripts Própio-->
    <script src="<?php echo BASE_URL; ?>assets/js/global.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/contato.js"></script>
    <!--Scripts externos-->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>
</body>

</html>