<?php
//Classe de aluno
include '../models/classLivro.php';

session_start();
$aluno = $_SESSION['nome_aluno'];
if(isset($_POST['btn_avalia'])):
	$nota = filter_var($_POST['nota'], FILTER_SANITIZE_STRING);
	$dsc_comentario = filter_var($_POST['dsc_comentario'], FILTER_SANITIZE_EMAIL);

	// inserindo os dados do livro na tabela livro
	$livro = new Livro();	
	$inserir = $livro->inserirAvaliacoes($codigo_livro, $aluno, $nota, $dsc_comentario);
	
	if($inserir){
		$_SESSION['mensagem'] = "Cadastro com sucesso!";
		header('Location: ../views/avaliarLivro.php');
	}else{
		$_SESSION['mensagem'] = "Erro ao executar função";
	}
endif;	

?>