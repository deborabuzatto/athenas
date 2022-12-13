<?php
//Classe de cliente
include_once '../models/classAluno.php';
session_start();

if(isset($_POST['btn-alterar'])){
	$codigo_pessoa = filter_var($_POST['codigo_pessoa'], FILTER_SANITIZE_STRING);
	$senha_atual = filter_var($_POST['senha_atual'], FILTER_SANITIZE_STRING);
	$senha_nova = filter_var($_POST['nova_senha'], FILTER_SANITIZE_STRING);
	
	$aluno = new Aluno();	
	$cripto = md5($senha_atual);
	$cripto2 = md5($senha_nova);
	$resultado = $aluno->select_senha($codigo_pessoa, $cripto);

	if(empty($resultado)){
		$_SESSION['nao_autenticado'] = true;
		header('Location: ../views/alterarSenha.php');
	}
	else{
		$resultado2 = $aluno->update_senha($codigo_pessoa, $cripto2);
		if($resultado2){
			$_SESSION['sucesso'] = true;
			header('Location: ../views/alterarSenha.php');	
		}else{
			$_SESSION['nao_autenticado'] = true;
			header('Location: ../views/alterarSenha.php');
		}
	}
}
?>