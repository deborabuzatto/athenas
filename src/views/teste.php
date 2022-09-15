<?php 
    require_once '../models/classConexao.php';

    $sql = "select * from pessoa where nome like '%debora%'";
    $data = Database::prepare($sql);
    $data->execute();

    print_r($data->fetchAll());
?>