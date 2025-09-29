<?php
function getDatabaseConnection()
{
    // Detecta se está em ambiente local ou produção
    $isLocal = ($_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === 'caiomartins.test' || strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false);

    if ($isLocal) {
        // Configuração para ambiente local
        $host = 'localhost:3306';
        $username = 'root';
        $password = '';
        $dbname = 'caiomartins';
    } else {
        // Configuração para ambiente de produção
        $host = 'localhost:3306';
        $username = 'tininh93_tininhofita';
        $password = 'Tino7227!';
        $dbname = 'tininh93_caiomartins';
    }

    $mysqli = new mysqli($host, $username, $password, $dbname);

    if ($mysqli->connect_error) {
        die("Falha na conexão: " . $mysqli->connect_error);
    }

    return $mysqli;
}
