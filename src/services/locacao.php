<?php
    include '../models/classLivro.php';
    date_default_timezone_set('America/Sao_Paulo');
    session_start();

    if(isset($_POST['btn-locar'])){
        $livro = filter_var($_POST['codigo_livro'], FILTER_SANITIZE_STRING);
        $pessoa = filter_var($_POST['codigo_pessoa'], FILTER_SANITIZE_STRING);
        $data_locacao = date("Y-m-d");
        $data_entrega = date("Y-m-d");
        //print_r($data_locacao);

        $loca = new Livro();
        
        $acao = $loca->locacao($livro, $pessoa, $data_locacao, $data_entrega);
        if($acao){
            $_SESSION['sucesso'] = $acao; 
            header('Location: ../views/locacao.php');
        }else{
            $_SESSION['erro'] = 'Não foi possível realizar a locação; Tente novamente mais tarde.';
            header('Location: ../views/erro.php');
        }
       
        
       
        /*$disponibilidade = $loca->disponibilidade($livro);
        if($disponibilidade['valor'] === "0"){
            
        } else{
            $_SESSION['erro'] = 'Este livro não está disponível e não pode ser devolvido por outro usuário';
        }*/

    }
?>