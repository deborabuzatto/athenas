<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['message'];

$arquivo = "
    <html>
        <p><b>Nome: </b>$nome</p>
        <p><b>E-mail: </b>$email</p>
        <p><b>Mensagem: </b>$mensagem</p>
    </html>
";

$destino = "deborabuzatto27@gmail.com";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

mail($destino, $arquivo, $headers);
header("Location: index.html");
?>