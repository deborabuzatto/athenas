<?php
//Classe de cliente
include_once '../models/classAluno.php';
session_start();

if(isset($_POST['btn-editar'])):

	$codigo_pessoa = filter_var($_POST['codigo_pessoa'], FILTER_SANITIZE_STRING);
	$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$nome_img = $_FILES['file']['name'];
	$extensao = pathinfo($nome_img, PATHINFO_EXTENSION);

	$aluno = new Aluno();	
	$aluno->setUsername($username);
	$aluno->setEmail($email);
	$aluno->setUrl_img($nome_img);
	
	// Recebendo nome do arquivo imagem, conferindo se o repositório onde ficará guardado existe
    $uploaddir  = '../components/dinamic/';
    $uploadfile  = $uploaddir . basename($_FILES['file']['name']);
    
    if (file_exists('../components/dinamic/') ) {
        // Verificando o tipo da imagem, caso seja jpg está liberada
        try {
            if ($extensao === 'jpg') {
                move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile );
                header('Location: ../views/meuperfil.php');
            }else{
                $_SESSION['imagem'] = true;
                header("Location: ../views/meuperfil.php");
                exit();
            }
        }catch(Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
        
    }else {
        if ($extensao === 'jpg') {
            mkdir('../components/dinamic/');
            move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile );
            header('Location: ../views/meuperfil.php');
        }else{
            $_SESSION['imagem'] = true;
            header("Location: ../views/meuperfil.php");
            exit();
        }
    }

    echo ' - Informacoes para debug: ';
    print_r($_FILES);
    

	if($aluno->update_perfil($codigo_pessoa)):
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header('Location: ../views/meuperfil.php');
	else:
		$_SESSION['mensagem'] = "Erro ao atualizar!";
		header('Location: ../views/homeAlunos.php');
	endif;
endif;	
?>