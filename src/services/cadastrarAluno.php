<?php
//Classe de aluno
include '../models/classAluno.php';
session_start();
if(isset($_POST['btn-cadastrar'])):
	
	$nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
	$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$data_nasc = filter_var($_POST['data_nasc'], FILTER_SANITIZE_NUMBER_INT);

	$senha = md5('biblioteca123');

	$aluno = new Aluno();	
	$aluno->setNome($nome);
	$aluno->setUsername($username);
	$aluno->setEmail($email);
	$aluno->setData_nasc($data_nasc);
	$aluno->setSenha($senha);
	
	if($aluno->insert()):
		$_SESSION['sucesso'] = "Aluno cadastrado com sucesso!";
		header('Location: ../views/cadastrarAluno.php');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar aluno!";		
		header('Location: ../views/cadastrarAluno.php');
	endif;
endif;	

?>