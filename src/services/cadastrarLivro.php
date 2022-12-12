<?php
//Classe de aluno
include '../models/classLivro.php';
session_start();
if(isset($_POST['btn-cadastrar'])):
	
	$titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_STRING);
	$editora = filter_var($_POST['editora'], FILTER_SANITIZE_STRING);
	$data_publicacao = filter_var($_POST['data_publicacao'], FILTER_SANITIZE_STRING);
	$ISBN = filter_var($_POST['ISBN'], FILTER_SANITIZE_STRING);
	$autor = filter_var($_POST['autor'], FILTER_SANITIZE_STRING);
	$nacionalidade = filter_var($_POST['nacionalidade'], FILTER_SANITIZE_STRING);
	$sinopse = filter_var($_POST['sinopse'], FILTER_SANITIZE_STRING);
    $categoria = filter_var($_POST['categoria'], FILTER_SANITIZE_STRING);
    $volume = filter_var($_POST['volume'], FILTER_SANITIZE_STRING);
    $edicao = filter_var($_POST['edicao'], FILTER_SANITIZE_STRING);
    $qtd_pag = filter_var($_POST['qtd_pag'], FILTER_SANITIZE_STRING);
	$nome_img = $_FILES['file']['name'];
	
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
	$livro->setvolume($volume);
    $livro->setedicao($edicao);
    $livro->setqtd_pag($qtd_pag);
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

    $caminho = $uploaddir.$nome_img;
    $teste = file_get_contents($caminho);
    $data = base64_encode($teste);
    $livro->seturl_img_64($data);


	$insert = $livro->insert();
    $_SESSION['sucesso'] = 'Livro adicionado com sucesso';
	header('Location: ../views/cadastrarLivro.php');
	
endif;	

?>