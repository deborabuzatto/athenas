<?php
//Classe de aluno
include '../models/classLivro.php';

if(isset($_POST['btn-cadastrar'])):
	
	$titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_STRING);
	$editora = filter_var($_POST['editora'], FILTER_SANITIZE_STRING);
	$data_publicacao = filter_var($_POST['data_publicacao'], FILTER_SANITIZE_STRING);
	$ISBN = filter_var($_POST['ISBN'], FILTER_SANITIZE_STRING);
	$autor = filter_var($_POST['autor'], FILTER_SANITIZE_EMAIL);
	$nacionalidade = filter_var($_POST['nacionalidade'], FILTER_SANITIZE_NUMBER_INT);
	$sinopse = filter_var($_POST['sinopse'], FILTER_SANITIZE_STRING);
	$categoria = filter_var($_POST['categoria'], FILTER_SANITIZE_NUMBER_INT);
	$nome_img = $_FILES['file']['name'];
	
    print_r($nome_img);
	// inserindo os dados do livro na tabela livro
	$livro = new Livro();	
	$livro->settitulo($titulo);
	$livro->setdata_publicacao($data_publicacao);
	$livro->setsinopse($sinopse);
	$livro->setISBN($ISBN);
	$livro->setautor($autor);
	$livro->setcategoria($categoria);
	$livro->seteditora($editora);
	$livro->setnacionalidade($nacionalidade);
	$livro->seturl_img($nome_img);
    $extensao = pathinfo($nome_img, PATHINFO_EXTENSION);
	
	// Recebendo nome do arquivo imagem, conferindo se o repositório onde ficará guardado existe
    $uploaddir  = '../components/dinamic/';
    $uploadfile  = $uploaddir . basename($_FILES['file']['name']);
    
    if (file_exists('../components/dinamic/') ) {
        // Verificando o tipo da imagem, caso seja jpg está liberada
        try {
            if ($extensao === 'jpg') {
                move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile );
            }else{
                $_SESSION['imagem'] = true;
                header("Location: ../views/cadastrarLivro.php");
                exit();
            }
        }catch(Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
        
    }else {
        if ($extensao === 'jpg') {
            mkdir('../components/dinamic/');
            move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile );
        }else{
            $_SESSION['imagem'] = true;
            header("Location: ../views/cadastrarLivro.php");
            exit();
        }
    }

    echo ' - Informacoes para debug: ';
    print_r($_FILES);
    

	$insert = $livro->insert();
    $_SESSION['sucesso'] = 'adicionado';
	header('Location: ../views/homeBibliotecario.php');
	
endif;	

?>