<?php
include '../models/classLivro.php';
    if(isset($_POST['btn-locar'])){

        

        $livro = filter_var($_POST['codigo_livro'], FILTER_SANITIZE_STRING);
        $pessoa = filter_var($_POST['codigo_pessoa'], FILTER_SANITIZE_STRING);

        print_r($livro);
    
        $loca = new Livro();
        $acao = $loca->locacao($livro, $pessoa);

        if($acao){
            header('Location: ../views/livrosBibliotecario.php');
        }else{
            header('Location: ../views/livrosBibliotecario.php');
        }
    }
?>