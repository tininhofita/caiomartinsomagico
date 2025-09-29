<?php

require_once __DIR__ . '/../../config/db_config.php';

class ContatoModel
{
    private $db;

    public function __construct()
    {
        $this->db = getDatabaseConnection();
    }

    public function salvarContato($nome, $telefone, $email, $assunto, $descricao)
    {
        if (strlen($descricao) > 500) {
            return ['error' => 'A descrição não pode exceder 500 caracteres.'];
        }

        $stmt = $this->db->prepare("INSERT INTO contatos (nome, telefone, email, assunto, descricao) VALUES (?, ?, ?, ?, ?)");
        if (!$stmt) {
            return ['error' => 'Erro ao preparar a consulta: ' . $this->db->error];
        }

        $stmt->bind_param("sssss", $nome, $telefone, $email, $assunto, $descricao);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return ['success' => true];
        }

        return ['error' => 'Não foi possível salvar o contato.'];
    }
}
