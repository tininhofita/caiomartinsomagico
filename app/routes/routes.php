<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../Router.php';
require_once __DIR__ . '/../controllers/AgendaController.php'; // Agenda no site publico

$router = new Router();
$agendaController = new AgendaController();

// ===========================
// Rotas de Visualização - Public
// ===========================

// Página: Home
$router->get('/', function () {
    include __DIR__ . '/../../public/views/home.php';
});

// Página: Agenda
$router->get('/agenda', function () {
    include __DIR__ . '/../../public/views/agenda.php';
});

// Página: Sobre
$router->get('/sobre', function () {
    include __DIR__ . '/../../public/views/sobre.php';
});

// Página: Contato
$router->get('/contato', function () {
    include __DIR__ . '/../../public/views/contato.php';
});

// ===========================
// Rotas de Buscar dados - Public
// ===========================


// Rota para buscar os eventos da agenda
$router->get('/agenda/events', function () use ($agendaController) {
    $agendaController->getEvents();
});


// ===========================
// Rotas de Visualização - Admin
// ===========================

// Página: login Admin
$router->get('/admin', function () {
    include __DIR__ . '/../../public/admin/index.php';
});

// Página: Home Admin
$router->get('/admin/menu', function () {
    include __DIR__ . '/../../admin/views/menu.php';
});

// Página: Agenda
$router->get('/admin/agenda', function () {
    include __DIR__ . '/../../admin/views/agenda.php';
});

// Página: Contato
$router->get('/admin/contatos', function () {
    include __DIR__ . '/../../admin/views/contato.php';
});

// Página: Banner
$router->get('/admin/banner', function () {
    include __DIR__ . '/../../admin/views/banner.php';
});

// Página: Usuários
$router->get('/admin/usuarios', function () {
    include __DIR__ . '/../../admin/views/usuarios.php';
});

// ===========================
// Rotas de Autenticação
// ===========================

$router->post('/admin/auth/login', function () {
    require_once __DIR__ . '/../controllers/AuthController.php';
    $authController = new AuthController();
    $authController->login();
});

$router->get('/admin/auth/logout', function () {
    require_once __DIR__ . '/../controllers/AuthController.php';
    $authController = new AuthController();
    $authController->logout();
});


// ===========================
// Admin - Usuários
// ===========================

// Listar Usuários
$router->get('/admin/usuarios/listar', function () {
    require_once __DIR__ . '/../controllers/UsuariosController.php';
    $controller = new ControllerUsuarios();
    $controller->listar();
});

// Adicionar Usuários
$router->post('/admin/usuarios/adicionar', function () {
    require_once __DIR__ . '/../controllers/UsuariosController.php';
    $controller = new ControllerUsuarios();
    $controller->adicionar();
});

// Excluir Usuários
$router->post('/admin/usuarios/excluir', function () {
    require_once __DIR__ . '/../controllers/UsuariosController.php';
    $controller = new ControllerUsuarios();
    $controller->excluir();
});

// Editar Usuários
$router->post('/admin/usuarios/editar', function () {
    require_once __DIR__ . '/../controllers/UsuariosController.php';
    $controller = new ControllerUsuarios();
    $controller->editar();
});

// ===========================
// Admin - Agenda
// ===========================

// Listar Eventos da Agenda
$router->get('/admin/agenda/listar', function () {
    require_once __DIR__ . '/../controllers/AgendaAdminController.php';
    $controller = new AgendaAdminController();
    $controller->listar();
});

// Adicionar Evento na Agenda
$router->post('/admin/agenda/adicionar', function () {
    require_once __DIR__ . '/../controllers/AgendaAdminController.php';
    $controller = new AgendaAdminController();
    $controller->adicionar();
});

// Editar Evento na Agenda
$router->post('/admin/agenda/editar', function () {
    require_once __DIR__ . '/../controllers/AgendaAdminController.php';
    $controller = new AgendaAdminController();
    $controller->editar();
});

// Remover Evento da Agenda
$router->post('/admin/agenda/remover', function () {
    require_once __DIR__ . '/../controllers/AgendaAdminController.php';
    $controller = new AgendaAdminController();
    $controller->remover();
});

// Detalhar Evento (usado para edição)
$router->post('/admin/agenda/detalhes', function () {
    require_once __DIR__ . '/../controllers/AgendaAdminController.php';
    $controller = new AgendaAdminController();
    $controller->detalhes();
});

// ===========================
// Admin - Contatos
// ===========================

// Buscar todos os contatos
$router->get('/admin/contatos/fetch', function () {
    require_once __DIR__ . '/../controllers/ContatoAdminController.php';
    $controller = new ContatoAdminController();
    $controller->fetchContacts();
});

// Remover contato
$router->post('/admin/contatos/excluir', function () {
    require_once __DIR__ . '/../controllers/ContatoAdminController.php';
    $controller = new ContatoAdminController();
    $controller->deleteContact();
});

// Responder contato
$router->post('/admin/contatos/responder', function () {
    require_once __DIR__ . '/../controllers/ContatoAdminController.php';
    $controller = new ContatoAdminController();
    $controller->responderContato();
});

// ===========================
// Admin - Banners
// ===========================

// Upload de Banner
$router->post('/admin/banner/upload', function () {
    require_once __DIR__ . '/../controllers/BannerController.php';
    $controller = new BannerController();
    $controller->uploadBanner();
});

$router->post('/admin/banner/delete', function () {
    require_once __DIR__ . '/../controllers/BannerController.php';
    $controller = new BannerController();
    $controller->deleteBanner();
});

// ===========================
// Enviar E-mail
// ===========================

// Rota para enviar contato
$router->post('/contato/enviar', function () {
    try {

        require_once __DIR__ . '/../controllers/ContatoController.php';

        $controller = new ContatoController();

        $controller->enviarMensagem();  // Alterado de enviarContato para enviarMensagem
    } catch (Exception $e) {
        error_log("Erro na rota /contato/enviar: " . $e->getMessage());
        echo json_encode(['success' => false, 'message' => 'Erro interno do servidor']);
    }
});
