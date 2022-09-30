<?php
//Iniciar  Sessão
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
//Classe de cliente
include_once './src/models/classAluno.php';

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

	if($aluno->update($codigo_pessoa)):
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header('Location: ../30_DB_index.php');
	else:
		$_SESSION['mensagem'] = "Erro ao atualizar!";
		header('Location: ../30_DB__index.php');
	endif;
endif;	



?>