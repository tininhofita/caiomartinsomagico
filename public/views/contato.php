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


    <!-- Hero Section -->
    <section class="hero-contato">
        <div class="hero-overlay"></div>
        <div class="container-hero">
            <div class="hero-content">
                <h1 class="hero-title" data-aos="fade-up">Vamos Criar Magia Juntos?</h1>
                <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">Entre em contato e vamos transformar seu evento em algo inesquecível!</p>
            </div>
        </div>
    </section>

    <!-- Formulário de Contato -->
    <section class="container my-4" id="contato">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="contato-card" data-aos="fade-up">
                    <div class="contato-header">
                        <h2 class="contato-title">Solicite seu Orçamento</h2>
                        <p class="contato-description">Preencha o formulário abaixo e entraremos em contato em breve</p>
                    </div>

                    <form id="contatoSite" action="/contato/enviar" method="POST" class="contato-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome" class="form-label">
                                        <i class="bi bi-person"></i>
                                        Nome Completo
                                    </label>
                                    <input type="text" class="form-control modern-input" id="nome" name="nome" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefone" class="form-label">
                                        <i class="bi bi-telephone"></i>
                                        Telefone/WhatsApp
                                    </label>
                                    <input type="text" class="form-control modern-input" id="telefone" name="telefone" placeholder="(11) 99999-9999" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">
                                <i class="bi bi-envelope"></i>
                                E-mail
                            </label>
                            <input type="email" class="form-control modern-input" id="email" name="email" placeholder="seu@email.com" required>
                        </div>

                        <div class="form-group">
                            <label for="assunto" class="form-label">
                                <i class="bi bi-tag"></i>
                                Tipo de Evento
                            </label>
                            <select class="form-control modern-input" id="assunto" name="assunto" required>
                                <option value="">Selecione o tipo de evento</option>
                                <option value="Aniversário">Aniversário</option>
                                <option value="Casamento">Casamento</option>
                                <option value="Evento Corporativo">Evento Corporativo</option>
                                <option value="Festa Infantil">Festa Infantil</option>
                                <option value="Show Privado">Show Privado</option>
                                <option value="Outro">Outro</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="descricao" class="form-label">
                                <i class="bi bi-chat-text"></i>
                                Conte-nos mais sobre seu evento
                            </label>
                            <textarea class="form-control modern-input" id="descricao" name="descricao" rows="4" maxlength="500" placeholder="Data, local, número de convidados, expectativas..." required></textarea>
                            <div class="char-counter">
                                <span id="descricao-counter">500 caracteres restantes</span>
                            </div>
                        </div>

                        <!-- Campo oculto para armazenar o token do reCAPTCHA -->
                        <input type="hidden" id="recaptchaToken" name="recaptchaToken">

                        <div class="form-submit">
                            <button type="submit" class="btn btn-magic">
                                <i class="bi bi-send"></i>
                                Enviar Solicitação
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Informações de Contato -->
    <section class="info-contato">
        <div class="container">
            <div class="row">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <h3>WhatsApp</h3>
                        <p>Fale conosco pelo WhatsApp</p>
                        <a
                            href="https://wa.me/5511976625333?text=Olá%2C+gostaria+de+saber+mais+sobre+os+shows+do+Caio+Martins%21"
                            class="info-link"
                            target="_blank"
                            rel="noopener">
                            (11) 97662-5333
                        </a>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <h3>E-mail</h3>
                        <p>Envie sua mensagem</p>
                        <a href="mailto:contato@caiomartinsomagico.com" class="info-link">contato@caiomartinsomagico.com</a>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="bi bi-clock-fill"></i>
                        </div>
                        <h3>Horário</h3>
                        <p>Atendimento disponível</p>
                        <span class="info-text">Seg - Sex: 9h às 18h</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="linha_decorativa"></div>


    <!-- Galeria de Shows -->
    <section class="galeria-shows">
        <div class="container">
            <h2 class="galeria-title" data-aos="fade-up">Momentos Mágicos</h2>
            <p class="galeria-subtitle" data-aos="fade-up" data-aos-delay="100">Alguns dos nossos shows mais recentes</p>

            <div class="galeria-grid">
                <div class="galeria-item" data-aos="zoom-in" data-aos-delay="100">
                    <div class="galeria-image">
                        <img src="<?php echo BASE_URL; ?>assets/imgs/contato/nesse_nipe5.webp" alt="Caio durante seu show solo de Stand-up Magic" class="img-fluid">
                        <div class="galeria-overlay">
                            <div class="galeria-content">
                                <h4>Stand-up Magic</h4>
                                <p>Comédia e mágica em perfeita harmonia</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="galeria-item" data-aos="zoom-in" data-aos-delay="200">
                    <div class="galeria-image">
                        <img src="<?php echo BASE_URL; ?>assets/imgs/contato/nesse_nipe2.webp" alt="Caio durante seu show solo de Stand-up Magic" class="img-fluid">
                        <div class="galeria-overlay">
                            <div class="galeria-content">
                                <h4>Interação com o Público</h4>
                                <p>Momentos únicos e inesquecíveis</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="galeria-item" data-aos="zoom-in" data-aos-delay="300">
                    <div class="galeria-image">
                        <img src="<?php echo BASE_URL; ?>assets/imgs/contato/nesse_nipe4.webp" alt="Caio durante seu show solo de Stand-up Magic" class="img-fluid">
                        <div class="galeria-overlay">
                            <div class="galeria-content">
                                <h4>Shows Personalizados</h4>
                                <p>Adaptados para cada tipo de evento</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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