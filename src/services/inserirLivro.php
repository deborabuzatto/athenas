<?php 

    $db = require("../utils/conexao.php");
    include("../models/classLivro.php");

    try {

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $inserir = $db->prepare('INSERT INTO livro(titulo) VALUES(:titulo)');
        $inserir->execute(array(
          ':titulo' => 'The Selection'
        ));
      
        echo $inserir->rowCount();
      } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
      }

?>