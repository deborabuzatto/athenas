
<?php 
    
    require("../models/classConexao.php");
    $arroz = 6;
    $sql="select distinct codigo_livro, titulo, dsc_status from livro_pessoa_loca lpl 
            join status_loca sl on(lpl.fk_status_loca_codigo_status=sl.codigo_status)
            join livro li on(lpl.fk_livro_codigo_livro=li.codigo_livro) where codigo_livro = :codigo_livro and dsc_status = 'disponivel'";
            $stmt = Database::prepare($sql);	
			$stmt->bindParam(':codigo_livro', $arroz);
			$stmt->execute();

            

    print_r($stmt->rowCount());

?>