<?php
    include("../models/classAluno.php");
    session_start();
    try {
        if(isset($_POST['btn-login'])){
            $aluno = new Aluno();
            $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
            $senha = filter_var($_POST['senha'], FILTER_SANITIZE_STRING);
            $cripto = md5($senha);
            $aluno->setEmail($email);
            $aluno->setSenha($cripto);

            $consulta = $aluno->login();
            if ($consulta){
                $id = $consulta["codigo_pessoa"];
                $email = $consulta["email"];
                $password = $consulta["senha"];
                $tipo = $consulta["fk_tipo_pessoa_codigo_tipo"];
                
                if($tipo != 1){
                    $_SESSION['aluno'] = $id;
                    header("Location: ../views/homeAlunos.php");
                }else{
                    $_SESSION['bibliotecario'] = true;
                    header("Location: ../views/homeBibliotecario.php");
                }
            }else{
                $_SESSION['nao_autenticado'] = true;
                header("Location: ../views/login.php");
                exit();
            }
        }
    }catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
    }
?>