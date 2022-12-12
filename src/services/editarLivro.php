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

	$insert = $livro->update($codigo_livro);
	$_SESSION['sucesso'] = 'Sucesso ao editar livro';
	header('Location: ../views/homeBibliotecario.php');
	
endif;	

?>