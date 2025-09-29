<?php
require_once __DIR__ . '/../../config/db_config.php';

class ModelUsuarios
{
    private $db;

    public function __construct()
    {
        $this->db = getDatabaseConnection();
    }

    // Método para listar todos os usuários
    public function getAllUsers()
    {
        $query = "SELECT id, name, username, email FROM users";
        $result = $this->db->query($query);

        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return $users;
    }

    // Método para adicionar um novo usuário
    public function addUser($name, $username, $email, $password)
    {
        $stmt = $this->db->prepare("INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $username, $email, $password);
        return $stmt->execute();
    }

    // Método para excluir um usuário
    public function deleteUser($id)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // Método para atualizar informações de um usuário
    public function updateUser($id, $name, $username, $email)
    {
        $stmt = $this->db->prepare("UPDATE users SET name = ?, username = ?, email = ? WHERE id = ?");
        $stmt->bind_param("sssi", $name, $username, $email, $id);
        return $stmt->execute();
    }
}
