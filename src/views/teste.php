
<?php 
    
    require("../models/classConexao.php");

    $sql = "INSERT INTO autor(nome, nacionalidade) VALUES ('aaa', 'brasil') returning codigo_autor";
    $stmt = Database::prepare($sql);
    $stmt->execute();
    $codigoLivro = $stmt->fetch()["codigo_autor"];

    print_r($codigoLivro);

?>