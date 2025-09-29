<?php

require_once __DIR__ . '/../models/AgendaModel.php';

class AgendaController
{
    public function getEvents()
    {
        try {
            $agendaModel = new AgendaModel();
            $events = $agendaModel->getUpcomingEvents();

            header('Content-Type: application/json');
            echo json_encode($events);
        } catch (Exception $e) {
            header('Content-Type: application/json', true, 500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}
