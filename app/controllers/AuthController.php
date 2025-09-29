<?php

require_once __DIR__ . '/../models/AuthModel.php';

class AuthController
{
    private $authModel;

    public function __construct()
    {
        $this->authModel = new AuthModel();
    }

    public function login()
    {
        header('Content-Type: application/json');

        $input = json_decode(file_get_contents('php://input'), true);
        $username = trim($input['username'] ?? '');
        $password = trim($input['password'] ?? '');

        if (empty($username) || empty($password)) {
            echo json_encode(['error' => 'Preencha todos os campos.']);
            exit;
        }

        $user = $this->authModel->getUserByName($username);

        if (!$user) {
            echo json_encode(['error' => 'Usuário não encontrado.']);
            exit;
        }

        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['name'] = $user['name']; // Salva o nome completo na sessão

            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'Senha incorreta.']);
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /admin');
        exit;
    }
}
