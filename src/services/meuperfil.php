<?php
//Classe de cliente
include_once '../models/classAluno.php';

if(isset($_POST['btn-editar'])):
	$codigo_pessoa = filter_var($_POST['codigo_pessoa'], FILTER_SANITIZE_STRING);
	$nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
	$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$data_nasc = filter_var($_POST['data_nasc'], FILTER_SANITIZE_NUMBER_INT);

	$aluno = new Aluno();	
	$aluno->setNome($nome);
	$aluno->setUsername($username);
	$aluno->setEmail($email);
	$aluno->setData_nasc($data_nasc);
	print_r($codigo_pessoa);

	if($aluno->update($codigo_pessoa)):
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header('Location: ../views/alunosBibliotecario.php');
	else:
		$_SESSION['mensagem'] = "Erro ao atualizar!";
		header('Location: ../views/alunoBibliotecario.php');
	endif;
endif;	



?>