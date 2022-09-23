<<<<<<< HEAD
<?php 
    require("../models/classAluno.php");
    $aluno = new Aluno();

    $usuarios = $aluno->findAll();

    foreach($usuarios as $user) {
        print_r($user);
        echo "\n";
    }
=======
<?php 
    require("../models/classAluno.php");
    $aluno = new Aluno();

    $usuarios = $aluno->findAll();

    foreach($usuarios as $user) {
        print_r($user);
        echo "\n";
    }
>>>>>>> af50a1e83a6d2eb1b31808fbf6dcefefb25e51cb
?>