<?php
//Classe de aluno
include '../models/classLivro.php';

if(isset($_POST['btn-excluir'])):
	
	$codigo_livro = filter_var($_POST['codigo_livro'], FILTER_SANITIZE_NUMBER_INT);

	$livro = new Livro();
    $excluir = $livro->excluir($codigo_livro);
	print_r($codigo_livro);

	if($excluir):
		$_SESSION['mensagem'] = "Cadastro com sucesso!";
		header('Location: ../views/livrosBibliotecario.php');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar!";		
		header('Location: ../views/livrosBibliotecario.php');
	endif;
endif;	

?>