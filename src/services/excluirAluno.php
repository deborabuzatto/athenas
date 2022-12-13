<?php
//Classe de aluno
include '../models/classAluno.php';
session_start();

if(isset($_POST['btn-excluir'])):
	$aluno = new Aluno();
	$codigo_pessoa = filter_var($_POST['codigo_pessoa'], FILTER_SANITIZE_STRING);
    $excluir = $aluno->excluir($codigo_pessoa);
	
	if($excluir):
		$_SESSION['sucesso'] = "Aluno cadastrado com sucesso";
		header('Location: ../views/alunosBibliotecario.php');
	else:
		$_SESSION['erro'] = "Erro ao cadastrar aluno";		
		header('Location: alunosBibliotecario.php');
	endif;
endif;	

?>