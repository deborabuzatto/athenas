<?php
   //A conexao com o banco está funcionando

    //Criar as constantes com as credencias de acesso ao banco de dados
    define('servername', 'localhost');
    define('username', 'root');
    define('password', 'usbw');
    define('db_name', 'athenas');
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