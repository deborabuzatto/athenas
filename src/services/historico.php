<?php 
    /*require("../utils/conexao.php");*/

    define('servername', 'localhost');
    define('username', 'root');
    define('password', 'usbw');
    define('db_name', 'athenas');
    define('porta', '3307');

    try{
        $conn = new PDO('mysql:host=' . servername . ';port=' . porta . ';dbname=' . db_name, username, password);
        echo "Connection is successful!<br/>";
        $sql = 'SELECT nome from pessoas';
        $users = $conn->query($sql);
        foreach ($users as $row) {
            print $row["nome"];
        }
        $conn = null;
        $users->execute();
    }
    catch(PDOexception $e){
        echo "Error is: " . $e-> etmessage();
    }
   

  
?>