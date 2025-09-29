<?php
require_once __DIR__ . '/../../config/db_config.php';

date_default_timezone_set('America/Sao_Paulo');

class AgendaAdminModel
{
    private $db;

    public function __construct()
    {
        $this->db = getDatabaseConnection();
    }

    public function getAllEvents()
    {
        $query = "SELECT id, DATE_FORMAT(date, '%Y-%m-%d') as date, city, venue, link 
              FROM agenda 
              WHERE date >= CURDATE() 
              ORDER BY date ASC";
        $result = $this->db->query($query);

        $events = [];
        while ($row = $result->fetch_assoc()) {
            $events[] = $row;
        }

        return $events;
    }

    public function addEvent($date, $city, $venue, $link)
    {
        $stmt = $this->db->prepare("INSERT INTO agenda (date, city, venue, link) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $date, $city, $venue, $link);
        return $stmt->execute();
    }

    public function updateEvent($id, $date, $city, $venue, $link)
    {
        $date = date('Y-m-d', strtotime($date));
        $stmt = $this->db->prepare("UPDATE agenda SET date = ?, city = ?, venue = ?, link = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $date, $city, $venue, $link, $id);
        return $stmt->execute();
    }

    public function deleteEvent($id)
    {
        $stmt = $this->db->prepare("DELETE FROM agenda WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function getEventById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM agenda WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }

        return null;
    }
}
