<?php
session_start();
include '../models/classLivro.php';
$aluno = $_SESSION['aluno'];

if(isset($_POST['btn-avalia'])){
	echo 'data';
	$livro = new Livro();
	$nota = filter_var($_POST['nota'], FILTER_SANITIZE_STRING);
	$codigo_livro = filter_var($_POST['codigo_livro'], FILTER_SANITIZE_STRING);
	$dsc_comentario = filter_var($_POST['dsc_comentario'], FILTER_SANITIZE_STRING);

	$inserir = $livro->inserirAvaliacoes($codigo_livro, $aluno, $nota, $dsc_comentario);
	if($inserir){
		$_SESSION['sucesso'] = "Livro avaliado com sucesso!";
		header('Location: ../views/homeAlunos.php');
	}else{
		$_SESSION['erro'] = "Erro ao executar função";
		header('Location: ../views/homeAlunos.php');
	}
}
?>