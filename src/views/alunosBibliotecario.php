<?php 
//Classe Aluno
include_once '../models/classAluno.php';
session_start();
if(isset($_SESSION['bibliotecario'])){
    usset
}

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Padrão -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Link font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="shortcut icon" href="/favicon/favicon.ico"/>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;700&family=Radio+Canada:wght@300&family=Roboto+Mono:wght@200&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet"> 


        <!-- Css externo -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        
        <link rel="stylesheet" href="/public/static/css/style.css">

        <!--<script src="js/api.js"></script>-->

        <title>Teste 1</title>
    </head>
    <body>
        <div class="tela">
            <div class="nav-login">
                <div class="nav-link-item">
                    <a href="index.html"><i class="fa fa-arrow-left-long"></i>Página Inicial</a>
                </div>

                <div class="page-info-name">
                    <p>Você está na página:</p><a href="#">Consultar Alunos</a>
                </div>

                <div class="nav-login-menu">
                    <img src="/public/static/imagens/logolaranja.png">
                    <p>"A leitura desenvolve a mente. O pensamento a alma."</p>
                </div>
            </div>
            
            

            <div class="conteudo-livro-page">
                <div class="busca-livro-page">
                    <form method="POST" action="#">
                        <input name="pesquisar" type="text" class="form-control" id="input-pesquisa" placeholder="Busque pelo nome completo" autocomplete="off">
                        <span>
                            <button type="submit" name="btn-buscar" class="btn btn-pesquisa">Buscar</button>
                        </span>
                        <span>
                            <button class="btn btn-pesquisa" name="btn-adicionar">Adicionar Aluno <i class="fa fa-plus"></i></button>
                        </span>
                    </form>
                    
                </div>

                <?php
                    if(isset($_POST['btn-adicionar'])){
                        header('Location: cadastrarAluno.php');
                    }

                    if(isset($_POST['btn-buscar'])):
                        $pesquisar = $_POST['pesquisar'];
                        $palavra = '%' . $pesquisar. '%';
                    
                        $aluno = new Aluno();
                        $busca = $aluno->busca($palavra);
                        if(count($busca)>0):
                            foreach($busca as $dados){
                        
                    
                ?>
                <div class="table-livro-aluno">
                    <div>
                        <div class="img-pessoa1">
                            <img src="/public/static/imagens/amoregelato.jpg">
                        </div>

                        

                        <div class="div-dados-aluno">
                            <h4><?php echo $dados['nome'];?></h4>
                            <p><span>Username:</span><?php echo $dados['username'];?></p>
                            <p><span>Data de nascimento:</span><?php echo $dados['data_nasc'];?></p>
                            <p><span>E-mail:</span><?php echo $dados['email'];?></p>
                        </div>

                        <div class="icones-table">
                            <p>
                                <a href="#" class="button-plus"><i class="fa fa-pencil"></i></a>
                            </p>
                            <p>
                                <a href="#" class="button-plus"><i class="fa fa-trash"></i></a>
                            </p>
                        </div>   
                    </div>
                </div>


                <?php
                }
                endif;
                else:
                        $aluno = new Aluno();
                        $imprimir = $aluno->findAll();
                        if(count($imprimir)>0):
                            foreach($imprimir as $dados){
                ?>
                    <div class="table-livro-aluno">
                        <div>
                            <div class="img-pessoa1">
                                <img src="/public/static/imagens/amoregelato.jpg">
                            </div>

                            

                            <div class="div-dados-aluno">
                                <h4><?php echo $dados['nome'];?></h4>
                                <p><span>Username:</span><?php echo $dados['username'];?></p>
                                <p><span>Data de nascimento:</span><?php echo $dados['data_nasc'];?></p>
                                <p><span>E-mail:</span><?php echo $dados['email'];?></p>
                            </div>

                            <div class="icones-table">
                                <p>
                                    <a href="#" class="button-plus"><i class="fa fa-pencil"></i></a>
                                </p>
                                <p>
                                    <a href="#" class="button-plus"><i class="fa fa-trash"></i></a>
                                </p>
                            </div>   
                        </div>
                    </div>
                
                
                <?php
                }
                endif;
                endif;
                ?>
                
                
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
            
            <?php 
                include '../components/footer.php';
            ?>
        </div>

        <!-- Script FontAwesome -->
        <script src="https://kit.fontawesome.com/a9ac96b7ba.js" crossorigin="anonymous"></script>

        <!-- Script Boostrap-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    </body>
</html>