<?php 

    $db = require("../utils/conexao.php");
    include("../models/classLivro.php");

    $codigo_livro = 6;
    $titulo= "Harry Potter e o batutinhas";

    try {

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $inserir = $db->prepare('UPDATE livro SET titulo = :titulo WHERE codigo_livro = :codigo_livro');
        $inserir->execute(array(
          ':titulo' => $titulo,
          ':codigo_livro' => $codigo_livro
        ));
      
        echo $inserir->rowCount();
      } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
      }

?>