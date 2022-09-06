<?php
    $db = require("../utils/conexao.php");
    include("../models/classAluno.php");
  
    try {

        // Processando dados do formulário quando o formulário que fez a requisição
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            // se variáveis vazias, redirecione para a mesma página
            /*if(empty(trim($_POST['usuario'])) || empty(trim($_POST['senha']))){
                $_SESSION['nao_autenticado'] = true;
                header('Location: login.php');
                exit();
            } 
            // se variáveis preenchidas...
            else{*/
                //string com a consulta select
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $consultar = $db->prepare("SELECT * FROM pessoa WHERE username = :usuario and senha = :password");

                //se o prepare existir...
                if($consultar){
                    $usuario = $_POST['usuario'];
                    $senhadgt = $_POST['senha'];
                    $cripto = md5($senhadgt);

                    // atribui os valores às variveis da consulta
                    $consultar->bindParam(":usuario", $usuario, PDO::PARAM_STR);
                    $consultar->bindParam(":password", $cripto, PDO::PARAM_STR);

                    //se a instrução retornar apenas uma linha, faça:
                    if($consultar->rowCount() == 1){

                        //percorra o que foi retornado
                        if($row = $consultar->fetch()){

                            //preencha as variaveis
                            $id = $row["id"];
                            $username = $row["username"];
                            $password = $row["senha"];

                            //tipo recebe dois, se checkbox marcado para bibliotecario
                            $tipo = $row["tipo_usuario"];

                            if($tipo == 2){
                                if($username == 'admin'){
                                    $_SESSION['bibliotecario'] = true;
                                    header("Location: homeBibliotecario.php");
                                    exit();
                                } else{
                                    $_SESSION['nao_autenticado'] = true;
                                    header("Location: login.php");
                                    exit();
                                }
                            }
                            else{
                                $_SESSION['aluno'] = true;
                                $_SESSION['nome_aluno'] = $username;
                                header("Location: homeAluno.php");
                                exit();
                            }
                            exit();
                        }
                        exit();
                    } else{
                        $_SESSION['nao_autenticado'] = true;
		                header("Location: login.php");
                        exit();
                    }
                }
                
                // Fechar declaração
                unset($consulta);
            //}
        }else{
            header("Location: login.php");
        }
    }      
    catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
    }

?>