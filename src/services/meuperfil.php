<?php
//Classe de cliente
include_once '../models/classAluno.php';

if(isset($_POST['btn-editar'])):
	$codigo_pessoa = filter_var($_POST['codigo_pessoa'], FILTER_SANITIZE_STRING);
	$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

	$aluno = new Aluno();	
	$aluno->setUsername($username);
	$aluno->setEmail($email);
	print_r($codigo_pessoa);

	if($aluno->update_perfil($codigo_pessoa)):
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header('Location: ../views/meuperfil.php');
	else:
		$_SESSION['mensagem'] = "Erro ao atualizar!";
		header('Location: ../views/homeAlunos.php');
	endif;
endif;	



?>