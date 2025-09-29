<?php
// Script de teste para email - SEM reCAPTCHA
require_once __DIR__ . '/../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

echo "<h1>Teste de Envio de Email</h1>";

// Dados de teste
$nome = "Teste Local";
$telefone = "11999999999";
$email = "teste@exemplo.com";
$assunto = "Teste de Email Local";
$descricao = "Este é um teste de envio de email sem reCAPTCHA.";

echo "<p><strong>Dados do teste:</strong></p>";
echo "<ul>";
echo "<li>Nome: $nome</li>";
echo "<li>Telefone: $telefone</li>";
echo "<li>Email: $email</li>";
echo "<li>Assunto: $assunto</li>";
echo "<li>Descrição: $descricao</li>";
echo "</ul>";

// Teste de envio
$mail = new PHPMailer(true);

try {
    echo "<p><strong>Iniciando teste de envio...</strong></p>";
    
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
    $mail->Subject = "TESTE LOCAL - Novo contato: $assunto";
    $mail->Body = "
    <h1>TESTE LOCAL - Novo Contato</h1>
    <p><strong>Nome:</strong> $nome</p>
    <p><strong>Telefone:</strong> $telefone</p>
    <p><strong>E-mail:</strong> $email</p>
    <p><strong>Assunto:</strong> $assunto</p>
    <p><strong>Descrição:</strong> $descricao</p>
    <p><strong>Data/Hora:</strong> " . date('d/m/Y H:i:s') . "</p>
    ";

    $result = $mail->send();
    
    if ($result) {
        echo "<p style='color: green;'><strong>✅ EMAIL ENVIADO COM SUCESSO!</strong></p>";
        echo "<p>Verifique a caixa de entrada de agenda@caiomartinsomagico.com</p>";
    } else {
        echo "<p style='color: red;'><strong>❌ FALHA NO ENVIO</strong></p>";
    }
    
} catch (Exception $e) {
    echo "<p style='color: red;'><strong>❌ ERRO:</strong> " . $e->getMessage() . "</p>";
    echo "<p><strong>Detalhes:</strong> " . $mail->ErrorInfo . "</p>";
}

echo "<hr>";
echo "<p><a href='../'>← Voltar para o site</a></p>";
?>
