<?php 

    $db = require("../utils/conexao.php");
    include("../models/classAluno.php");

    try {
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $inserir = $db->prepare('INSERT INTO pessoa(nome) VALUES(:nome)');
      $inserir->execute(array(
        ':nome' => ''
      ));
      echo $inserir->rowCount();
    }
    
    catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
    }

?>