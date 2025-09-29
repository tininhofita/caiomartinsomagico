<?php
require_once __DIR__ . '/../models/BannerModel.php';

class BannerController
{
    private $model;
    private $uploadDir;

    public function __construct()
    {
        $this->model = new BannerModel();
        $this->uploadDir = __DIR__ . '/../../public/assets/imgs/banner/';
    }

    public function uploadBanner()
    {
        header('Content-Type: application/json');

        if (!isset($_FILES["bannerImage"])) {
            echo json_encode(['success' => false, 'message' => 'Nenhum arquivo enviado.']);
            return;
        }

        $file = $_FILES["bannerImage"];
        $position = $_POST['bannerPosition'] ?? null;
        $altText = $_POST['bannerAltText'] ?? '';

        if (!$position) {
            echo json_encode(['success' => false, 'message' => 'Posição do banner não especificada.']);
            return;
        }

        // Validações da imagem
        $imageFileType = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (!in_array($imageFileType, $allowedTypes)) {
            echo json_encode(['success' => false, 'message' => 'Formato de arquivo não permitido.']);
            return;
        }

        $check = getimagesize($file["tmp_name"]);
        if (!$check) {
            echo json_encode(['success' => false, 'message' => 'O arquivo não é uma imagem válida.']);
            return;
        }

        // Define o caminho para salvar a imagem
        $fileName = uniqid() . '.' . $imageFileType;
        $filePath = $this->uploadDir . $fileName;

        if (move_uploaded_file($file["tmp_name"], $filePath)) {
            $relativePath = 'assets/imgs/banner/' . $fileName;

            if ($this->model->saveBanner($relativePath, $position, $altText)) {
                echo json_encode(['success' => true, 'imagePath' => '/' . $relativePath]);
            } else {
                unlink($filePath); // Remove o arquivo se o banco falhar
                echo json_encode(['success' => false, 'message' => 'Erro ao salvar no banco de dados.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao enviar o arquivo.']);
        }
    }

    public function deleteBanner()
    {
        header('Content-Type: application/json');

        // Receber os dados do request
        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'] ?? null;

        if (!$id) {
            echo json_encode(['success' => false, 'message' => 'ID do banner não fornecido.']);
            return;
        }

        // Busca o banner pelo ID
        $banner = $this->model->getBannerById($id);
        if (!$banner) {
            echo json_encode(['success' => false, 'message' => 'Banner não encontrado.']);
            return;
        }

        // Remove o banner e o arquivo
        $filePath = __DIR__ . '/../../public/' . $banner['image_path'];
        if ($this->model->deleteBanner($id)) {
            if (file_exists($filePath)) {
                unlink($filePath); // Remove a imagem do servidor
            }
            echo json_encode(['success' => true, 'message' => 'Banner removido com sucesso.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao remover o banner.']);
        }
    }
}
