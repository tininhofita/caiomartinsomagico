<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/layouts/header.css">

<header class="header-modern">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <!-- Logo/Brand -->
            <a class="navbar-brand" href="/">
                <div class="brand-container">
                    <img src="<?= BASE_URL ?>assets/imgs/logo/icone.webp" alt="Caio Martins" class="brand-logo">
                    <div class="brand-text">
                        <span class="brand-name">Caio Martins</span>
                        <span class="brand-subtitle">Mágico & Comediante</span>
                    </div>
                </div>
            </a>

            <!-- Mobile Menu Toggle -->
            <button class="navbar-toggler mobile-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>

            <!-- Navigation Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/agenda">
                            <i class="bi bi-calendar-event"></i>
                            <span>Agenda</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/sobre">
                            <i class="bi bi-person"></i>
                            <span>Sobre</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contato">
                            <i class="bi bi-envelope"></i>
                            <span>Contato</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/videos">
                            <i class="bi bi-play-btn"></i>
                            <span>Videos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link course-link" href="https://magicocaiom.kpages.online/magicas-para-churrasco-com-caio-martins-065f873f-c331-4646-8b7f-648eed4866af" target="_blank">
                            <i class="bi bi-graduation-cap"></i>
                            <span>Curso de Mágicas</span>
                        </a>
                    </li>
                </ul>

                <!-- Social Links -->
                <div class="header-social-links">
                    <a href="https://www.instagram.com/caiomartinsomagico/" class="header-social-link instagram" target="_blank" aria-label="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://www.facebook.com/CaioMartinsOmagico" class="header-social-link facebook" target="_blank" aria-label="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://www.youtube.com/channel/UCP0GCsHtgGdCyQMA2QCbZ6g" class="header-social-link youtube" target="_blank" aria-label="YouTube">
                        <i class="bi bi-youtube"></i>
                    </a>
                    <a href="https://www.tiktok.com/@caiomartinsomagico" class="header-social-link tiktok" target="_blank" aria-label="TikTok">
                        <i class="bi bi-tiktok"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>