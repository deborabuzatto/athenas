<?php
//Classe de aluno
include '../models/classAluno.php';

//Iniciar  Sessão
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

if(isset($_POST['btn-cadastrar'])):
	
	$titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_STRING);
	$data_publicacao = filter_var($_POST['data_publicacao'], FILTER_SANITIZE_STRING);
	$ISBN = filter_var($_POST['ISBN'], FILTER_SANITIZE_STRING);
	$autor = filter_var($_POST['autor'], FILTER_SANITIZE_EMAIL);
	$nacionalidade = filter_var($_POST['nacionalidade'], FILTER_SANITIZE_NUMBER_INT);
	$sinopse = filter_var($_POST['sinopse'], FILTER_SANITIZE_NUMBER_INT);

	$livro = new Livro();	
	$livro->settitulo($titulo);
	$livro->setdata_publicacao($data_publicacao);
	$livro->setsinopse($sinopse);
	$livro->setISBN($ISBN);

	$inserirLivro = $livro->insertLivro();
	$inserirAutor = $livro->insertAutor($autor, $nacionalidade);

	$sql="INSERT INTO livro_autor (	FK_LIVRO_codigo_livro, FK_AUTOR_codigo_autor) VALUES (:nome, :nacionalidade)";
	$stmt = Database::prepare($sql);
	$stmt->bindParam(':nome', $this->nome);
	$stmt->bindParam(':nacionalidade', $this->nacionalidade);
	
	return $stmt->execute();
	
	if($inserirLivro && $inserirAutor):
		$_SESSION['mensagem'] = "Cadastro com sucesso!";
		header('Location: ../views/alunosBibliotecario.php');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar!";		
		header('Location: alunosBibliotecario.php');
	endif;
endif;	

?>