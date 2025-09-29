<?php
// Função para registrar logs
// function logError($message)
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

// Define a URL base do projeto (no Virtual Host, public já é a raiz)
define('BASE_URL', '/');

// Define a constante BASE_PATH para facilitar o acesso às pastas
define('BASE_PATH', __DIR__);

// Log básico para confirmar que o index.php foi carregado
// logError('index.php foi carregado');

// Encaminha todas as requisições para o router.php
try {
    require_once __DIR__ . '/../app/Router.php';
    // logError('Router.php foi carregado com sucesso');

    // Instancia o roteador
    $router = new Router();

    // Inclui o arquivo de rotas
    require_once __DIR__ . '/../app/routes/routes.php';

    // Despacha as rotas
    $router->dispatch();
} catch (Exception $e) {
    // logError('Erro ao carregar Router.php: ' . $e->getMessage());
    echo "Erro ao carregar o Router.";
    exit;
}
