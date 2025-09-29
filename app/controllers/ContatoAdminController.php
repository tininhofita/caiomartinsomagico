<?php
require_once __DIR__ . '/../models/ContatoAdminModel.php';
require_once __DIR__ . '/../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContatoAdminController
{
    private $model;

    public function __construct()
    {
        $this->model = new ContatoAdminModel();
    }

    public function fetchContacts()
    {
        $contatos = $this->model->getAllContatos();
        header('Content-Type: application/json');
        echo json_encode($contatos);
    }

    public function deleteContact()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        if (!isset($data['id'])) {
            echo json_encode(['error' => 'ID do contato não fornecido.']);
            return;
        }

        $result = $this->model->deleteContato($data['id']);
        header('Content-Type: application/json');
        echo json_encode($result);
    }

    public function responderContato()
    {
        $email = $_POST['email'] ?? null;
        $assunto = $_POST['assunto'] ?? null;
        $mensagem = $_POST['mensagem'] ?? null;

        if (!$email || !$assunto || !$mensagem) {
            echo "Todos os campos são obrigatórios.";
            return;
        }

        // Inicializar o PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configuração do servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.titan.email'; // Ajuste conforme seu servidor
            $mail->SMTPAuth = true;
            $mail->Username = 'tininho@caiomartinsomagico.com';
            $mail->Password = 'Tino7227!'; // Substitua pela senha correta
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Método de segurança
            $mail->Port = 465;

            // Configuração do remetente e destinatário
            $mail->setFrom('tininho@caiomartinsomagico.com', 'Caio Martins');
            $mail->addReplyTo('contato@caiomartinsomagico.com', 'Caio Martins'); // Define o email para resposta
            $mail->addAddress($email);

            // Configuração do conteúdo do e-mail
            $mail->isHTML(true);
            $mail->Subject = $assunto;
            $mail->Body = nl2br(htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8'));

            // Enviar o e-mail
            $mail->send();
            echo "Resposta enviada com sucesso!";
        } catch (Exception $e) {
            // Registrar o erro para depuração
            error_log("Erro ao enviar resposta: " . $mail->ErrorInfo);
            echo "Erro ao enviar resposta: " . $mail->ErrorInfo;
        }
    }
}
