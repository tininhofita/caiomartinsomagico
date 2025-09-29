<?php

class Router
{
    private $routes = [];

    // Registra uma rota GET
    public function get($path, $callback)
    {
        $this->routes['GET'][$path] = $callback;
        // $this->logError("Rota GET registrada: {$path}");
    }

    // Registra uma rota POST
    public function post($path, $callback)
    {
        $this->routes['POST'][$path] = $callback;
        // $this->logError("Rota POST registrada: {$path}");
    }

    // Função para registrar logs
    // private function logError($message)
    // {
    //     $logFile = __DIR__ . '/../logs/log.txt'; // Caminho do arquivo de log
    //     $timestamp = date('Y-m-d H:i:s'); // Timestamp do log
    //     $logMessage = "[{$timestamp}] {$message}" . PHP_EOL;

    //     // Certifique-se de que a pasta /logs existe
    //     if (!is_dir(__DIR__ . '/../logs')) {
    //         mkdir(__DIR__ . '/../logs', 0777, true);
    //     }

    //     // Escreve no arquivo de log
    //     file_put_contents($logFile, $logMessage, FILE_APPEND);
    // }

    // Despacha a requisição para a rota correspondente
    public function dispatch()
    {
        // Log para verificar se o dispatch foi chamado
        // $this->logError('Dispatch foi chamado');

        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = $_SERVER['REQUEST_URI'];

        // Log de informações sobre a requisição
        // $this->logError("Método da Requisição: {$requestMethod}");
        // $this->logError("URI da Requisição: {$requestUri}");

        // Remove query string da URL
        $requestUri = explode('?', $requestUri)[0];

        // Verifica se a rota existe
        if (isset($this->routes[$requestMethod][$requestUri])) {
            // $this->logError("Rota encontrada: {$requestUri}");
            call_user_func($this->routes[$requestMethod][$requestUri]);
        } else {
            // $this->logError("Rota não encontrada: {$requestUri}");
            http_response_code(404);
            echo "Página não encontrada!";
        }
    }
}
