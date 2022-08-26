<?php 

    $db = require("../utils/conexao.php");
    include("../models/classAluno.php");

    $codigo_pessoa = 5;
    $data = "24/10/1999";
    $nome= "Bruno Duarte";

    try {

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $inserir = $db->prepare('UPDATE pessoa SET nome = :nome, data_nasc = :data_nasc WHERE codigo_pessoa = :codigo_pessoa');
        $inserir->execute(array(
          ':nome' => $nome,
          ':codigo_pessoa' => $codigo_pessoa,
          ':data_nasc' => $data
        ));
      
        echo $inserir->rowCount();
      } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
      }

?>