<?php 
    require("../models/classAluno.php");
    $aluno = new Aluno();

    $usuarios = $aluno->findAll();

    foreach($usuarios as $user) {
        print_r($user);
        echo "\n";
    }
?>