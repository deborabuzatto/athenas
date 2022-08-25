<?php
   //conexao com o banco de dados
    /*$servername = "localhost"; 
    $username = "root";
    $password = "usbw";
    $db_name = "bancolibrary1";

    $conexao = mysqli_connect($servername, $username, $password, $db_name);

    if(mysqli_connect_error()):
        echo "falha".mysqli_connect_error();
    endif;*/



    //Criar as constantes com as credencias de acesso ao banco de dados
    define('servername', 'localhost');
    define('username', 'root');
    define('password', 'usbw');
    define('db_name', 'bancolibrary1');
    define('porta', '3307');


    //Criar a conexão com banco de dados usando o PDO e a porta do banco de dados
    try {
        $conn = new pdo('mysql:host=' . servername . ';port=' . porta . ';dbname=' . db_name, username, password);
        echo "Conexão realizada com sucesso.";
    } 
    catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
?>