<?php
//Classe de aluno
include '../models/classLivro.php';
session_start();
if(isset($_POST['btn-editar'])):
	$codigo_livro = filter_var($_POST['codigo_livro'], FILTER_SANITIZE_NUMBER_INT);
	$titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_STRING);
	$editora = filter_var($_POST['editora'], FILTER_SANITIZE_STRING);
	$data_publicacao = filter_var($_POST['data_publicacao'], FILTER_SANITIZE_STRING);
	$ISBN = filter_var($_POST['ISBN'], FILTER_SANITIZE_STRING);
	$autor = filter_var($_POST['autor'], FILTER_SANITIZE_STRING);
	$nacionalidade = filter_var($_POST['nacionalidade'], FILTER_SANITIZE_STRING);
	$sinopse = filter_var($_POST['sinopse'], FILTER_SANITIZE_STRING);
	$categoria = filter_var($_POST['categoria'], FILTER_SANITIZE_STRING);

	$livro = new Livro();	

	$verifica_img = $livro->find_l($codigo_livro);
	if(empty($_FILES['file']['name'])){
		$nome_img = $verifica_img['img_capa'];
	}else{
		$nome_img = $_FILES['file']['name'];
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
					//header("Location: ../views/cadastrarLivro.php");
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
				//header("Location: ../views/cadastrarLivro.php");
				exit();
			}
		}
	
		$caminho = $uploaddir.$nome_img;
		$teste = file_get_contents($caminho);
		$data = base64_encode($teste);
		$livro->seturl_img_64($data);
	}

	// inserindo os dados do livro na tabela livro
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

	
	


	$insert = $livro->update($codigo_livro);
	$_SESSION['sucesso'] = 'Sucesso ao editar livro';
	//header('Location: ../views/homeBibliotecario.php');
	
endif;	

?>