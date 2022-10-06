<?php
//Classe de aluno
include '../models/classAluno.php';

//Iniciar  Sessão
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

if(isset($_POST['btn-excluir'])):
	
	$codigo_pessoa = filter_var($_POST['codigo_pessoa'], FILTER_SANITIZE_STRING);

	$aluno = new Aluno();
    $excluir = $aluno->excluir($codigo_pessoa);
	
	if($excluir):
		$_SESSION['mensagem'] = "Cadastro com sucesso!";
		header('Location: ../views/alunosBibliotecario.php');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar!";		
		header('Location: alunosBibliotecario.php');
	endif;
endif;	

?>