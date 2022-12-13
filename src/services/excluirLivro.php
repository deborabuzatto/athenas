<?php
//Classe de livros
include '../models/classLivro.php';
session_start();

if(isset($_POST['btn-excluir'])){
	$livro = new Livro();
	$codigo_livro = filter_var($_POST['codigo_livro'], FILTER_SANITIZE_NUMBER_INT);
	echo $codigo_livro;

    $excluir = $livro->excluir($codigo_livro);

	if($excluir){
		$_SESSION['sucesso'] = 'Livro excluido com sucesso';
		header('Location: ../views/homeBibliotecario.php');
	}else{
		$_SESSION['erro'] = 'Erro ao excluir livro';
		header('Location: ../views/homeBibliotecario.php');
	}
}
?>