<?php
require_once __DIR__ . '/../models/UsuariosModel.php';

class ControllerUsuarios
{
    private $model;

    public function __construct()
    {
        $this->model = new ModelUsuarios();
    }

    public function adicionar()
    {
        $name = $_POST['name'] ?? ''; // Novo campo 'name'
        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = password_hash($_POST['password'] ?? '', PASSWORD_DEFAULT);

        if (empty($name) || empty($username) || empty($email) || empty($password)) {
            echo json_encode(['error' => 'Todos os campos são obrigatórios.']);
            return;
        }

        if ($this->model->addUser($name, $username, $email, $password)) {
            echo json_encode(['success' => 'Usuário adicionado com sucesso.']);
        } else {
            echo json_encode(['error' => 'Erro ao adicionar usuário.']);
        }
    }

    public function listar()
    {
        $users = $this->model->getAllUsers();
        echo json_encode($users);
    }

    public function excluir()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $id = $data['id'] ?? 0;

        if ($this->model->deleteUser($id)) {
            echo json_encode(['success' => 'Usuário excluído com sucesso.']);
        } else {
            echo json_encode(['error' => 'Erro ao excluir usuário.']);
        }
    }

    public function editar()
    {
        $id = $_POST['id'] ?? 0;
        $name = $_POST['name'] ?? ''; // Novo campo 'name'
        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';

        if (empty($id) || empty($name) || empty($username) || empty($email)) {
            echo json_encode(['error' => 'Todos os campos são obrigatórios.']);
            return;
        }

        if ($this->model->updateUser($id, $name, $username, $email)) {
            echo json_encode(['success' => 'Usuário atualizado com sucesso.']);
        } else {
            echo json_encode(['error' => 'Erro ao editar usuário.']);
        }
    }
}
