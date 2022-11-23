<?php
//Classe de cliente
include_once '../models/classAluno.php';

if(isset($_POST['btn-alterar'])):
	$codigo_pessoa = filter_var($_POST['codigo_pessoa'], FILTER_SANITIZE_STRING);
	$senha_atual = filter_var($_POST['senha_atual'], FILTER_SANITIZE_STRING);
	$senha_nova = filter_var($_POST['nova_senha'], FILTER_SANITIZE_STRING);
	$confirma = filter_var($_POST['confirma_senha'], FILTER_SANITIZE_STRING);
	
    if($senha_nova != $confirma){
        $_SESSION['nao_autenticado'] = true;
        header('Location: ../views/alterarSenha.php');
    }

	$aluno = new Aluno();	
	$aluno->setSenha($senha_atual);
	
	if($aluno->update_senha($codigo_pessoa, $senha_nova)):
		header('Location: ../views/alterarSenha.php');
	else:
		$_SESSION['nao_autenticado'] = true;
		header('Location: ../views/alterarSenha.php');
	endif;
endif;	



?>