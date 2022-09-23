<?php
//Classe de aluno
include '../models/classLivro.php';

//Iniciar  Sessão
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

if(isset($_POST['btn-cadastrar'])):
	
	$titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_STRING);
	$data_publicacao = filter_var($_POST['data_publicacao'], FILTER_SANITIZE_STRING);
	$ISBN = filter_var($_POST['ISBN'], FILTER_SANITIZE_STRING);
	$autor = filter_var($_POST['autor'], FILTER_SANITIZE_EMAIL);
	$nacionalidade = filter_var($_POST['nacionalidade'], FILTER_SANITIZE_NUMBER_INT);
	$sinopse = filter_var($_POST['sinopse'], FILTER_SANITIZE_NUMBER_INT);
	$categoria = filter_var($_POST['categoria'], FILTER_SANITIZE_NUMBER_INT);
	$addcategoria = filter_var($_POST['addcategoria'], FILTER_SANITIZE_NUMBER_INT);

	// inserindo os dados do livro na tabela livro
	$livro = new Livro();	
	$livro->settitulo($titulo);
	$livro->setdata_publicacao($data_publicacao);
	$livro->setsinopse($sinopse);
	$livro->setISBN($ISBN);
	$insert = $livro->insert();
	// inserindo o autor na tabela autor
	$inserirAutor = $livro->insertAutor($autor, $nacionalidade);
	// conectando o livro ao autor 
	$inserirLivro_Autor = $livro->insertLivro_Autor($insert, $inserirAutor);

	// tente inserir a categoria
	$inserirCategoria = $livro->insertCategoria($addcategoria);
	if($inserirCategoria){
		// se retornar true, a categoria não existia e foi inserida
		// conexao do livro com o autor
		$inserirLivro_categoria = $livro->categoriaSelecionada($insert, $inserirCategoria);
		$_SESSION['mensagem'] = "Cadastro com sucesso!";
		header('Location: ../views/livrosBibliotecario.php');
	}else{
		// se a categoria já existir, imprima o erro
		echo 'ERROR: essa categoria já existe, não é possível cadastrá-la novamente';

	}

	
	/*if($inserirLivro && $inserirAutor):
		$_SESSION['mensagem'] = "Cadastro com sucesso!";
		header('Location: ../views/alunosBibliotecario.php');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar!";		
		header('Location: alunosBibliotecario.php');
	endif;*/
endif;	

?>