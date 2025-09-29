<?php
require_once __DIR__ . '/../models/AgendaAdminModel.php';

class AgendaAdminController
{
    private $model;

    public function __construct()
    {
        $this->model = new AgendaAdminModel();
    }

    public function listar()
    {
        echo json_encode($this->model->getAllEvents());
    }

    public function adicionar()
    {
        $input = json_decode(file_get_contents('php://input'), true);

        $date = $input['date'] ?? '';
        $city = $input['city'] ?? '';
        $venue = $input['venue'] ?? '';
        $link = $input['link'] ?? '';

        if (empty($date) || empty($city) || empty($venue)) {
            echo json_encode(['error' => 'Todos os campos obrigatórios devem ser preenchidos.']);
            return;
        }

        if ($this->model->addEvent($date, $city, $venue, $link)) {
            echo json_encode(['success' => 'Evento adicionado com sucesso.']);
        } else {
            echo json_encode(['error' => 'Erro ao adicionar evento.']);
        }
    }

    public function editar()
    {
        $input = json_decode(file_get_contents('php://input'), true);

        $id = $input['id'] ?? 0;
        $date = $input['date'] ?? '';
        $city = $input['city'] ?? '';
        $venue = $input['venue'] ?? '';
        $link = $input['link'] ?? '';

        if ($this->model->updateEvent($id, $date, $city, $venue, $link)) {
            echo json_encode(['success' => 'Evento atualizado com sucesso.']);
        } else {
            echo json_encode(['error' => 'Erro ao atualizar evento.']);
        }
    }

    public function remover()
    {
        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'] ?? 0;

        if ($this->model->deleteEvent($id)) {
            echo json_encode(['success' => 'Evento removido com sucesso.']);
        } else {
            echo json_encode(['error' => 'Erro ao remover evento.']);
        }
    }

    public function detalhes()
    {
        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'] ?? 0;

        if (!$id || !is_numeric($id)) {
            echo json_encode(['error' => 'ID inválido.']);
            return;
        }

        $event = $this->model->getEventById($id);

        if ($event) {
            echo json_encode($event);
        } else {
            echo json_encode(['error' => 'Evento não encontrado.']);
        }
    }
}
