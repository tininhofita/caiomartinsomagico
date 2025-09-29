<?php

require_once __DIR__ . '/../../config/db_config.php';


class AuthModel
{
    private $db;

    public function __construct()
    {
        $this->db = getDatabaseConnection();
    }

    public function getUserByName($username)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}
