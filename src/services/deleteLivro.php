<?php 

    $db = require("../utils/conexao.php");
    include("../models/classAluno.php");

    $codigo_livro = 6;

    try {

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $inserir = $db->prepare('DELETE FROM livro WHERE codigo_livro = :codigo_livro');
        $inserir->execute(array(
          ':codigo_livro' => $codigo_livro
        ));
      
        echo $inserir->rowCount();
      } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
      }

?>