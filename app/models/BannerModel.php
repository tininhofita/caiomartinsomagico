<?php

require_once __DIR__ . '/../../config/db_config.php';

class BannerModel
{
    private $db;

    public function __construct()
    {
        $this->db = getDatabaseConnection();
    }

    public function saveBanner($filePath, $position, $altText)
    {
        // Verifica se já existe um banner na posição especificada
        $stmt = $this->db->prepare("SELECT id FROM banners WHERE position = ?");
        $stmt->bind_param('i', $position);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Atualiza o banner existente na posição
            $stmt = $this->db->prepare("UPDATE banners SET image_path = ?, alt_text = ? WHERE position = ?");
            $stmt->bind_param('ssi', $filePath, $altText, $position);
        } else {
            // Insere um novo banner
            $stmt = $this->db->prepare("INSERT INTO banners (image_path, position, alt_text) VALUES (?, ?, ?)");
            $stmt->bind_param('sis', $filePath, $position, $altText);
        }

        return $stmt->execute();
    }

    public function getAllBanners()
    {
        $result = $this->db->query("SELECT id, image_path, position, alt_text FROM banners ORDER BY position ASC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getBannersForHome()
    {
        $stmt = $this->db->query("SELECT position, image_path, alt_text FROM banners ORDER BY position ASC");
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteBanner($id)
    {
        $stmt = $this->db->prepare("DELETE FROM banners WHERE id = ?");
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

    public function getBannerById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM banners WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }
}
