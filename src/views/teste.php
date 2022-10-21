
<?php 
    
    require("../models/classConexao.php");
    $id = 1;
    $aa = 1111;
    $sql="UPDATE livro SET ISBN = :ISBN WHERE codigo_livro = :id returning FK_EDITORA_codigo_edit";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ISBN', $aa);
            $stmt->execute();
            $FK_EDITORA_codigo_edit = $stmt->fetch()["FK_EDITORA_codigo_edit"];


    print_r($FK_EDITORA_codigo_edit);

?>