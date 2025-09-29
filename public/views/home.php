<?php
require_once __DIR__ . '/../../app/models/BannerModel.php'; // Caminho correto

$bannerModel = new BannerModel();
$banners = $bannerModel->getBannersForHome();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caio Martins</title>

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

    <link rel="icon" type="image/x-icon" href="<?= BASE_URL ?>assets/imgs/logo/favicon-32x32.png">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/reset.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/index.css">

    <!-- Preconnect e DNS-Prefetch -->
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">

    <!-- Meta Tags de SEO -->
    <meta name="description"
        content="Caio Martins, mágico e comediante de São Paulo. Combina mágica com stand-up comedy em um espetáculo único.">
    <meta name="keywords"
        content="Caio Martins, mágico, comediante, mágica com stand-up, show de mágica, comédia, stand-up comedy, apresentações na TV, SBT, Record, Globo, Comedy Central, A culpa é do Cabral, especial de stand-up, mágica e comédia, São Paulo">
    <meta name="author" content="Caio Martins">

    <!-- Seach Console -->
    <meta name="google-site-verification" content="WhlPg3aVMsAFjoxm9o4QSus5IibQofax4mAxjtG85m0" />

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Caio Martins">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://caiomartinsomagico.com/">
    <meta property="og:image" content="https://caiomartinsomagico.com/public/assets/imgs/home/caio1.webp">
    <meta property="og:description"
        content="Caio Martins, mágico e comediante de São Paulo, combina mágica com stand-up comedy em um espetáculo único.">
</head>


<body>

    <!--header-->
    <?php include 'layouts/header.php'; ?>


    <!-- Banner -->
    <section>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php foreach ($banners as $index => $banner): ?>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $index ?>"
                        class="<?= $index === 0 ? 'active' : '' ?>" aria-label="Slide <?= $index + 1 ?>"></button>
                <?php endforeach; ?>
            </div>
            <div class="carousel-inner">
                <?php foreach ($banners as $index => $banner): ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                        <img src="<?= BASE_URL . $banner['image_path'] ?>"
                            class="d-block w-100"
                            width="1963"
                            height="926"
                            alt="<?= htmlspecialchars($banner['alt_text']) ?>"
                            loading="lazy">
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <div class="linha_decorativa"></div>

    <!--Magica-->

    <section id="magica-cartas">
        <h1 class="titulo-geral">Antes de tudo, memorize uma carta</h1>
        <div class="cartas" id="cartas">
            <div class="carta">
                <img src="<?= BASE_URL ?>assets/imgs/cartas/carta_azul.webp" class="verso" alt="Verso da carta azul">
                <img src="<?= BASE_URL ?>assets/imgs/cartas/rei_ouro.webp" class="frente" alt="Rei de Ouro">
            </div>
            <div class="carta">
                <img src="<?= BASE_URL ?>assets/imgs/cartas/carta_vermelha.webp" class="verso" alt="Verso da carta vermelha">
                <img src="<?= BASE_URL ?>assets/imgs/cartas/damas_espadas.webp" class="frente" alt="Dama de Espadas">
            </div>
            <div class="carta">
                <img src="<?= BASE_URL ?>assets/imgs/cartas/carta_azul.webp" class="verso" alt="Verso da carta azul">
                <img src="<?= BASE_URL ?>assets/imgs/cartas/rei_copas.webp" class="frente" alt="Rei de Copas">
            </div>
            <div class="carta">
                <img src="<?= BASE_URL ?>assets/imgs/cartas/carta_vermelha.webp" class="verso" alt="Verso da carta vermelha">
                <img src="<?= BASE_URL ?>assets/imgs/cartas/valete_espadas.webp" class="frente" alt="Valete de Espadas">
            </div>
            <div class="carta">
                <img src="<?= BASE_URL ?>assets/imgs/cartas/carta_azul.webp" class="verso" alt="Verso da carta azul">
                <img src="<?= BASE_URL ?>assets/imgs/cartas/damas_ouro.webp" class="frente" alt="Dama de Ouro">
            </div>
        </div>
    </section>

    <div class="linha_decorativa"></div>

    <!-- SOBRE -->
    <section class="conteudo_home">
        <div class="sobre-index container mt-3" data-aos="fade-up">
            <div class="row">
                <div class="col-md-6 container-sobre order-md-2 order-1">
                    <!-- Texto do lado direito -->
                    <h2 class="titulo-geral mb-3">Caio Martins</h2>
                    <p class="conteudo-sobre" data-aos="fade-left">Nascido na cidade de Bauru-SP em 92, Caio Martins se
                        interessou por mágica
                        na
                        adolescência e se viu
                        totalmente apaixonado pela arte. Começou a trabalhar exclusivamente com mágica aos 18 anos e
                        dois
                        anos depois se mudou para São Paulo capital onde começou a misturar seus números de mágica com
                        Stand-up comedy, hoje se tornando o mais conhecido do Brasil se tratando de mágica com comédia.
                        Já
                        se apresentou em canais de TV como, SBT, Record, Globo e está na programação do Comedy Central
                        com
                        seu show e também um dos convidado do programa “A culpa é do Cabral” na emissora, o maior e mais
                        conceituado canal de comédia do mundo. E tem o primeiro especial de Stand-up comedy magic
                        gravado no
                        mundo, que você pode conferir em <a href="https://www.youtube.com/@CaioMartinsOmagico"
                            target="_blank" class="links-externos">seu canal.</a> Com textos autorais e personalidade
                        única,
                        Caio Martins
                        vem conquistando fãs por onde passa!</p>
                    <!-- Botão de redirecionamento -->
                    <a href="/sobre" class="btn btn-redirecionar d-none d-lg-block">Saiba mais</a>
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-center order-md-1 order-2">
                    <!-- Espaço para as duas fotos -->
                    <img src="<?= BASE_URL ?>assets/imgs/home/caio1.webp" width="1196" height="797"
                        alt="Caio Martins realizando uma mágica com baralho" class="imagem-sobre-1 mb-3">
                    <img src="<?= BASE_URL ?>assets/imgs/home/caio2.webp" width="1196" height="797"
                        alt="Caio Martins realizando uma mágica com pombo" class="imagem-sobre-2">
                </div>
                <!-- Botão de redirecionamento -->
                <div class="col-12 order-md-3 order-3">
                    <img src="<?= BASE_URL ?>assets/imgs/logo/icone.webp" alt="Logo do Caio Martins" class="meu-icone-sobre">
                    <a href="/sobre" class="btn btn-redirecionar d-lg-none">Saiba mais</a>
                </div>
            </div>
        </div>

        <div class="linha_decorativa"></div>

        <!-- SOBRE - REDES SOCIAIS-->

        <div class="sobre-index container mt-3 mb-3" data-aos="fade-up">
            <div class="row">
                <!-- Coluna do texto e números, que incluirá tudo exceto a imagem e o botão -->
                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-left">
                    <!-- Título -->
                    <h2 class="titulo-secundario mb-3">Meus Números nas Redes</h2>
                    <!-- Descrição curta -->
                    <p class="descricao-numeros">A conexão com a galera nas redes é total! Confere só os números:</p>
                    <!-- Lista de números das redes sociais -->
                    <ul class="lista-numeros">
                        <li><a href="#" target="_blank"><i class="bi bi-instagram instaCaio"></i>Instagram:
                                <strong>+<span class="contador" data-target="230">0</span>k de seguidores</strong></a>
                        </li>
                        <li><a href="#" target="_blank"><i class="bi bi-youtube youtubeCaio"></i>YouTube: <strong>+<span
                                        class="contador" data-target="700">0</span>k de inscritos</strong></a></li>
                        <li><a href="#" target="_blank"><i class="bi bi-facebook faceCaio"></i>Facebook: <strong>+<span
                                        class="contador" data-target="545">0</span>k de seguidores</strong></a></li>
                        <li><a href="#" target="_blank"><i class="bi bi-tiktok tiktokCaio"></i>TikTok: <strong>+<span
                                        class="contador" data-target="500">0</span>k de seguidores</strong></a></li>
                        <li><a href="#" target="_blank"><i class="bi bi-camera-reels-fill kwaiCaio"></i>Kwai:
                                <strong>+<span class="contador" data-target="40">0</span>k de seguidores</strong></a>
                        </li>
                    </ul>
                    <!-- Descrição longa -->
                    <p class="descricao-numeros">Caio Martins já alcançou a incrível marca de mais de <strong
                            class="destaque_texto">600 milhões</strong> de visualizações em seus vídeos nas redes
                        sociais. Sendo um dos únicos mágico comediante a postar vídeos diários em todo mundo.</p>
                </div>
                <!-- Coluna da imagem -->
                <div class="col-lg-6 order-md-1 order-2 d-flex justify-content-center">
                    <img src="<?= BASE_URL ?>assets/imgs/home/caioRedes.webp" width="1010" height="1500" alt="Perfil Digital"
                        class="img-fluid foto-perfil mb-3">
                </div>
                <!-- Botão 'CONTRATE', que aparecerá após a imagem no mobile -->
                <div class="col-12 d-lg-none text-center order-3">
                    <a href="/contato" class="btn btn-redirecionar mt-3">CONTRATE</a>
                </div>
                <!-- Botão 'CONTRATE' para desktop, no final da primeira coluna -->
                <div class="col-lg-6 d-none d-lg-flex justify-content-end order-md-3 order-lg-2">
                    <a href="/contato" class="btn btn-redirecionar align-self-end">CONTRATE</a>
                </div>
            </div>
        </div>
    </section>

    <div class="linha_decorativa"></div>

    <div class="card-magic">
        <img src="<?= BASE_URL ?>assets/imgs/cartas/carta_vermelha.webp" alt="Carta de baralho vermelha" class="magic-card"
            style="animation-delay: 0s;">
        <img src="<?= BASE_URL ?>assets/imgs/cartas/carta_azul.webp" alt="Carta de baralho azul" class="magic-card"
            style="animation-delay: 2s;">
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
    <!-- Scripts Próprio -->
    <script>
        const BASE_URL = "";
    </script>
    <script src="<?= BASE_URL ?>assets/js/global.js"></script>
    <script src="<?= BASE_URL ?>assets/js/magica.js"></script>

    <!--Scripts AOS-->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script>
        AOS.init();
    </script>


</body>

</html>