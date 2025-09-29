<?php
// Script de teste para email - VERSÃO SIMPLES (sem PHPMailer)
echo "<h1>Teste de Envio de Email - Versão Simples</h1>";

// Dados de teste
$nome = "Teste Local";
$telefone = "11999999999";
$email = "teste@exemplo.com";
$assunto = "Teste de Email Local";
$descricao = "Este é um teste de envio de email sem reCAPTCHA usando função mail() nativa.";

echo "<p><strong>Dados do teste:</strong></p>";
echo "<ul>";
echo "<li>Nome: $nome</li>";
echo "<li>Telefone: $telefone</li>";
echo "<li>Email: $email</li>";
echo "<li>Assunto: $assunto</li>";
echo "<li>Descrição: $descricao</li>";
echo "</ul>";

// Configurações do email
$to = "agenda@caiomartinsomagico.com";
$subject = "TESTE LOCAL - Novo contato: $assunto";
$message = "
TESTE LOCAL - Novo Contato

Nome: $nome
Telefone: $telefone
E-mail: $email
Assunto: $assunto
Descrição: $descricao
Data/Hora: " . date('d/m/Y H:i:s') . "

---
Enviado via script de teste
";

$headers = "From: agenda@caiomartinsomagico.com\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

echo "<p><strong>Iniciando teste de envio...</strong></p>";

// Tentar enviar email
$result = mail($to, $subject, $message, $headers);

if ($result) {
    echo "<p style='color: green;'><strong>✅ EMAIL ENVIADO COM SUCESSO!</strong></p>";
    echo "<p>Verifique a caixa de entrada de agenda@caiomartinsomagico.com</p>";
} else {
    echo "<p style='color: red;'><strong>❌ FALHA NO ENVIO</strong></p>";
    echo "<p>Possíveis causas:</p>";
    echo "<ul>";
    echo "<li>Servidor não configurado para envio de emails</li>";
    echo "<li>Função mail() desabilitada</li>";
    echo "<li>Configurações SMTP incorretas</li>";
    echo "</ul>";
}

echo "<hr>";
echo "<p><a href='../'>← Voltar para o site</a></p>";
echo "<p><a href='test_email.php'>← Testar com PHPMailer</a></p>";
?>
