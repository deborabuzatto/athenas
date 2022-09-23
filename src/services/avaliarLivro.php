<?php
//Classe de aluno
include '../models/classLivro.php';

//Iniciar  Sessão
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

if(isset($_POST['btn-avaliar'])):
	
	$codigo_livro = filter_var($_POST['codigo_livro'], FILTER_SANITIZE_STRING);
	$codigo_livro = filter_var($_POST['codigo_pessoa'], FILTER_SANITIZE_STRING);
	$nota = filter_var($_POST['nota'], FILTER_SANITIZE_STRING);
	$dsc_comentario = filter_var($_POST['dsc_comentario'], FILTER_SANITIZE_EMAIL);

	// inserindo os dados do livro na tabela livro
	$livro = new Livro();	
	$livro->avaliarLivro($codigo_livro, $codigo_pessoa, $nota, $dsc_comentario);
	
    
	// tente inserir a categoria
	$inserirCategoria = $livro->insertCategoria($addcategoria);
	if($inserirCategoria){
		// se retornar true, a categoria não existia e foi inserida
		// conexao do livro com o autor
		$inserirLivro_categoria = $livro->categoriaSelecionada($insert, $inserirCategoria);
		$_SESSION['mensagem'] = "Cadastro com sucesso!";
		header('Location: ../views/livrosBibliotecario.php');
	}else{
		// se a categoria já existir, imprima o erro
		echo 'ERROR: essa categoria já existe, não é possível cadastrá-la novamente';

	}

	
	/*if($inserirLivro && $inserirAutor):
		$_SESSION['mensagem'] = "Cadastro com sucesso!";
		header('Location: ../views/alunosBibliotecario.php');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar!";		
		header('Location: alunosBibliotecario.php');
	endif;*/
endif;	

?>