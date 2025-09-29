<?php

require_once __DIR__ . '/../../config/db_config.php';

class AgendaModel
{
    private $db;

    public function __construct()
    {
        $this->db = getDatabaseConnection();
    }

    public function getUpcomingEvents()
    {
        $query = "SELECT * FROM agenda WHERE date >= CURDATE() ORDER BY date ASC";
        $result = $this->db->query($query);

        if (!$result) {
            throw new Exception("Erro ao buscar eventos: " . $this->db->error);
        }

        $events = [];
        while ($row = $result->fetch_assoc()) {
            $events[] = $row;
        }

        return $events;
    }

    public function __destruct()
    {
        $this->db->close();
    }
}
