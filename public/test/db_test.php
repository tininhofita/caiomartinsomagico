<?php
// Inclui o arquivo de configuração do banco de dados
require_once __DIR__ . '/../../config/db_config.php';

// Testa a conexão com o banco de dados
try {
    // Usa a função getDB() para obter a conexão
    $connection = getDatabaseConnection();

    // Executa uma consulta simples para testar a conexão
    $query = "SELECT DATABASE() AS db_name";
    $result = $connection->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        echo "Conexão bem-sucedida! Banco de dados atual: " . $row['db_name'];
        $result->free(); // Libera o resultado da consulta
    } else {
        echo "Erro ao executar a consulta: " . $connection->error;
    }

    // Fecha a conexão com o banco de dados
    $connection->close();
} catch (Exception $e) {
    echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
}
