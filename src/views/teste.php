
<?php 
    
    require("../models/classConexao.php");

    $sql = "SELECT * FROM comentario";
    $stmt = Database::prepare($sql);
    $stmt->execute();
    $resp = $stmt->fetchAll();

    foreach($resp as $x) {
        print_r($x);
        echo "<br>";
    }

?>