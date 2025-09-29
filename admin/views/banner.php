<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /admin');
    exit;
}

require_once __DIR__ . '/../../app/models/BannerModel.php';

$bannerModel = new BannerModel();
$banners = $bannerModel->getAllBanners();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Banners</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>admin/assets/css/banner.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="/assets/imgs/logo/logo-tininho.png">
</head>

<body class="bannerList">

    <!-- Header -->
    <?php include 'layouts/header-admin.php'; ?>
    <!-- Nav -->
    <?php include 'layouts/nav-admin.php'; ?>

    <main>
        <h1 class="tituloBanner">Gerenciador de Banners</h1>
        <p class="paragrafoBanner">Dimensões Recomendadas: <span class="aviso">1963x926</span> e Formato <span class="aviso">.webp</span></p>
        <form id="bannerForm" enctype="multipart/form-data" style="display: none;">
            <label for="bannerImage">Selecione uma imagem para o banner:</label>
            <input type="file" id="bannerImage" name="bannerImage" accept="image/*,.webp" required>

            <label for="bannerPosition">Posição do Banner:</label>
            <select id="bannerPosition" name="bannerPosition" required>
                <option value="1">Banner 1</option>
                <option value="2">Banner 2</option>
                <option value="3">Banner 3</option>
            </select>

            <label for="bannerAltText">Texto Alternativo (Alt):</label>
            <input type="text" id="bannerAltText" name="bannerAltText" maxlength="255" required>

            <button type="submit" class="btn-principal">Upload</button>
        </form>

        <div id="bannerPreview" class="banner-container">
            <?php
            // Inicializa os espaços para os três banners
            for ($i = 1; $i <= 3; $i++):
                $banner = array_filter($banners, fn($b) => $b['position'] == $i);
                $banner = $banner ? array_values($banner)[0] : null;
            ?>
                <div class="banner-card">
                    <?php if ($banner): ?>
                        <!-- Banner carregado -->
                        <img src="<?php echo BASE_URL . $banner['image_path']; ?>"
                            alt="<?php echo htmlspecialchars($banner['alt_text']); ?>"
                            class="banner-image">
                        <div class="banner-info">
                            <p class="banner-alt-text"><?php echo htmlspecialchars($banner['alt_text']); ?></p>
                            <div class="banner-actions">
                                <button class="btn-preto" data-id="<?php echo $banner['id']; ?>">Remover</button>
                                <button class="btn-adicionar" data-position="<?php echo $i; ?>">Adicionar</button>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Botão para adicionar banner -->
                        <div class="banner-placeholder">
                            <button class="btn-adicionar" data-position="<?php echo $i; ?>">+ Adicionar Banner</button>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endfor; ?>
        </div>
    </main>



    <!-- Footer -->
    <?php include 'layouts/footer-admin.php'; ?>

    <script src="/admin/assets/javascript/banners.js"></script>

</body>

</html>