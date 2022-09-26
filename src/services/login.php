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
            $aluno->setSenha($senha);

            $consulta = $aluno->login();
            if ($consulta) {
                $id = $consulta["codigo_pessoa"];
                $email = $consulta["email"];
                $password = $consulta["senha"];
                $usuario = $consulta["username"];

                if(isset($_POST['bibliotecario'])){
                    if($email == 'admin'){
                        $_SESSION['bibliotecario'] = true;
                        header("Location: ../views/homeBibliotecario.php");
                        exit();
                    } else{
                        $_SESSION['nao_autenticado'] = true;
                        header("Location: ../views/login.php");
                        exit();
                    }
             
                }else{
                    $_SESSION['aluno'] = true;
                    $_SESSION['nome_aluno'] = $id;
                    header("Location: ../views/homeAlunos.php");
                    exit();

                }
      
            }else{
                $_SESSION['nao_autenticado'] = true;
                header("Location: ../views/login.php");
                exit();
            }
        }else{header("Location: ../views/login.php");}
    }catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
    }

?>