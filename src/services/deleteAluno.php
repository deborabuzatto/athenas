<?php 

    $db = require("../utils/conexao.php");
    include("../models/classAluno.php");

    $codigo_pessoa = 5;

    try {

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $inserir = $db->prepare('DELETE FROM pessoa WHERE codigo_pessoa = :codigo_pessoa');
        $inserir->execute(array(
          ':codigo_pessoa' => $codigo_pessoa
        ));
      
        echo $inserir->rowCount();
      } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
      }

?>