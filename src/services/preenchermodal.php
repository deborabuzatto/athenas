<<<<<<< HEAD
<?php 
//Classe Aluno
include_once '../models/classLivro.php';
?>

<?php
	if(isset($_POST['formId'])){
		$id = $_POST['infoHidden'];
		$livro = new Livro();
		$imprimir = $livro->findAll($id);
		if(count($imprimir)>0):
			foreach($imprimir as $a){
=======
<?php 
//Classe Aluno
include_once '../models/classLivro.php';
?>

<?php
	if(isset($_POST['formId'])){
		$id = $_POST['infoHidden'];
		$livro = new Livro();
		$imprimir = $livro->findAll($id);
		if(count($imprimir)>0):
			foreach($imprimir as $a){
>>>>>>> af50a1e83a6d2eb1b31808fbf6dcefefb25e51cb
?>