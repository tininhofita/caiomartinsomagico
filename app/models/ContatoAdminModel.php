<?php

require_once __DIR__ . '/../../config/db_config.php'; // Ajuste o caminho conforme a estrutura real

class ContatoAdminModel
{
    private $db;

    public function __construct()
    {
        $this->db = getDatabaseConnection();
    }

    public function getAllContatos()
    {
        $query = "SELECT id, nome, telefone, email, assunto, descricao, data_contato FROM contatos ORDER BY data_contato DESC";
        $result = $this->db->query($query);

        if (!$result) {
            return ['error' => 'Erro ao buscar contatos: ' . $this->db->error];
        }

        $contatos = [];
        while ($row = $result->fetch_assoc()) {
            $contatos[] = $row;
        }

        return $contatos;
    }

    public function deleteContato($id)
    {
        $stmt = $this->db->prepare("DELETE FROM contatos WHERE id = ?");
        if (!$stmt) {
            return ['error' => 'Erro ao preparar a consulta: ' . $this->db->error];
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return ['success' => true];
        }

        return ['error' => 'Não foi possível excluir o contato.'];
    }
}
