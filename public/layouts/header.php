<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/layouts/header.css">

<header>
    <nav class="menu navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid d-flex justify-content-between">
            <!--Menu Hamburguer-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--Fim - Menu Hamburguer-->
            <a class="navbar-brand" href="/">
                <img src="<?= BASE_URL ?>assets/imgs/logo/icone.webp" alt="Icone Caio Martins" width="30"
                    class="icone_principal d-inline-block align-text-top">
                <span class="titulo_site">Caio Martins</span>
            </a>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/agenda">Agenda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/sobre">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contato">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://magicocaiom.kpages.online/magicas-para-churrasco-com-caio-martins-065f873f-c331-4646-8b7f-648eed4866af" target="_blank">Curso de Mágicas</a>
                    </li>
                </ul>
            </div>
            <div class="rede-social d-flex align-items-center">
                <a href="https://www.instagram.com/caiomartinsomagico/" class="me-2" target="_blank" aria-label="Visite meu Instagram"><i
                        class="bi bi-instagram"></i></a>
                <a href="https://www.facebook.com/CaioMartinsOmagico" class="me-2" target="_blank" aria-label="Visite meu Facebook"><i
                        class="bi bi-facebook"></i></a>
                <a href="https://www.youtube.com/channel/UCP0GCsHtgGdCyQMA2QCbZ6g" target="_blank" aria-label="Visite meu Twitter"><i
                        class="bi bi-youtube"></i></a>
            </div>
        </div>
    </nav>
</header>