<?php
require_once __DIR__ . '/../models/ContatoModel.php';
require_once __DIR__ . '/../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContatoController
{
    private $model;

    public function __construct()
    {
        $this->model = new ContatoModel();
    }

    public function enviarMensagem()
    {
        header('Content-Type: application/json');

        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new Exception('Método não permitido');
            }

            $nome = $_POST['nome'] ?? null;
            $telefone = $_POST['telefone'] ?? null;
            $email = $_POST['email'] ?? null;
            $assunto = $_POST['assunto'] ?? null;
            $descricao = $_POST['descricao'] ?? null;
            $recaptchaToken = $_POST['recaptchaToken'] ?? null;

            if (!$nome || !$telefone || !$email || !$assunto || !$descricao || !$recaptchaToken) {
                throw new Exception('Todos os campos são obrigatórios.');
            }

            if (!$this->validarRecaptchaEnterprise($recaptchaToken)) {
                throw new Exception('Falha na verificação do reCAPTCHA.');
            }

            $result = $this->model->salvarContato($nome, $telefone, $email, $assunto, $descricao);
            if (!$result['success']) {
                throw new Exception($result['error'] ?? 'Erro ao salvar no banco de dados');
            }

            if (!$this->enviarEmail($nome, $telefone, $email, $assunto, $descricao)) {
                throw new Exception('Erro ao enviar e-mail');
            }

            echo json_encode(['success' => true, 'message' => 'Mensagem enviada com sucesso!']);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    private function validarRecaptchaEnterprise($token)
    {
        $apiKey = 'AIzaSyBFEynqjQrSLwlyriKIf1O2Fuio6pqJBGc';
        $projectId = '608314170718';
        $siteKey = '6Lcf1oYqAAAAAAjPLuZLsnDvhPJA7dpS7UesUE44';

        $url = "https://recaptchaenterprise.googleapis.com/v1/projects/{$projectId}/assessments?key={$apiKey}";
        $data = [
            'event' => [
                'token' => $token,
                'siteKey' => $siteKey,
                'expectedAction' => 'submit_form_contato'
            ]
        ];

        $options = [
            'http' => [
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($data),
                'ignore_errors' => true
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if ($result === FALSE) {
            return false;
        }

        $response = json_decode($result, true);

        if (isset($response['error'])) {
            return false;
        }

        if (!isset($response['tokenProperties']['valid']) || !$response['tokenProperties']['valid']) {
            return false;
        }

        $score = $response['riskAnalysis']['score'] ?? 0;
        return $score > 0.5;
    }

    private function enviarEmail($nome, $telefone, $email, $assunto, $descricao)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.titan.email';
            $mail->SMTPAuth = true;
            $mail->Username = 'agenda@caiomartinsomagico.com';
            $mail->Password = 'C4ioM4rt1ns@7718';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->CharSet = 'UTF-8';

            $mail->setFrom('agenda@caiomartinsomagico.com', 'Caio Martins');
            $mail->addAddress('agenda@caiomartinsomagico.com');

            $mail->isHTML(true);
            $mail->Subject = "Novo contato: $assunto";
            $mail->Body = "
            <h1>Novo Contato</h1>
            <p><strong>Nome:</strong> $nome</p>
            <p><strong>Telefone:</strong> $telefone</p>
            <p><strong>E-mail:</strong> $email</p>
            <p><strong>Assunto:</strong> $assunto</p>
            <p><strong>Descrição:</strong> $descricao</p>
            ";

            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Erro ao enviar email: " . $e->getMessage());
            return false;
        }
    }
}
