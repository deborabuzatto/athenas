<?php 
//Classe Aluno
include_once '../models/classLivro.php';
session_start();
//Header
//include_once '30_DB_header.php';
//Mensagem
//include_once '30_DB_mensagem.php';
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
                    <a href="homeAlunos.html"><i class="fa fa-arrow-left-long"></i>Página Inicial</a>
                </div>

                <div class="page-info-name">
                    <p>Você está vendo:</p><a href="#">Ranking de notas</a>
                </div>

                <div class="nav-login-menu">
                    <img src="/public/static/imagens/logolaranja.png">
                    <p>"A leitura desenvolve a mente. O pensamento a alma."</p>
                </div>
            </div>
            
            

            <div class="conteudo-livro-page">
                <div class="busca-livro-page">
                    <form method="post">
                        <input type="text" class="form-control" id="input-pesquisa" placeholder="Busque por título ou autor" name="pesquisar">
                        
                        <select class="form-select" name="Categoria" >
                            <option selected>Categoria</option>
                            <option value="2">Romance</option>
                            <option value="3">Literatura estrangeira</option>
                            <option value="4">Fantasia</option>
                            <option value="5">Terror</option>
                            <option value="6">Suspense</option>
                            <option value="7">Clássico</option>
                            <option value="8">Poesia</option>
                        </select>

                        <span>
                            <button class="btn btn-pesquisa" name="btn-buscar">Pesquisar</button>
                        </span>
                    </form>
                </div>

                <?php
                    if(isset($_POST['btn-buscar'])):
                        $pesquisar = $_POST['pesquisar'];
                        $palavra = '%' . $pesquisar. '%';
                    
                        $livro = new Livro();
                        $busca = $livro->buscarLivro($palavra);
                        if(count($busca)>0):
                            foreach($busca as $dados){
                ?>

                <div class="table-livro-aluno">
                    <div>
                        <div>
                            <img src="/public/static/imagens/amoregelato.jpg">
                        </div>
                        <div class="table-conteudo">
                            <h4><?php echo $dados['titulo'];?></h4>
                            <?php
                                $livro = new Livro();
                                $codigo_livro = $dados['codigo_livro']; 
                                $disponibilidade = $livro->disponibilidade($codigo_livro);
                                if($disponibilidade['valor'] === "0"){
                            ?>
                                <p class="disponibilidade">Disponível</p>
                            <?php
                                } else{   
                            ?>
                                <p class="disponibilidade">Indisponível</p>
                            <?php
                            }
                            ?>
                            <p class="categoria"><?php echo $dados['categoria'];?></p>
                            <p class="categoria"><?php echo $dados['nota'];?></p>
                            <p class="sinopse"><?php echo $dados['sinopse'];?></p>
                        </div>
                    </div>                    
                </div>
                
                <?php
                }
                endif;
                else:
                    $livro = new Livro();
                    $imprimir = $livro->rankingNota();
                    if(count($imprimir)>0):
                        foreach($imprimir as $dados){
                ?>

                <div class="table-livro-aluno">
                    <div>
                        <div>
                            <img src="/public/static/imagens/amoregelato.jpg">
                        </div>
                        
                        <div class="table-conteudo">
                            <h4><?php echo $dados['titulo'];?></h4>
                            <?php
                                $livro = new Livro();
                                $codigo_livro = $dados['codigo_livro']; 
                                $disponibilidade = $livro->disponibilidade($codigo_livro);
                                if($disponibilidade['valor'] === "0"){
                            ?>
                                <p class="disponibilidade">Disponível</p>
                            <?php
                                } else{   
                            ?>
                                <p class="disponibilidade">Indisponível</p>
                            <?php
                            }
                            ?>
                            <p class="categoria"><?php echo $dados['categoria'];?></p>
                            <p class="categoria"><?php echo $dados['nota'];?></p>
                            <p class="sinopse"><?php echo $dados['sinopse'];?></p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#informacoes<?php echo $dados['codigo_livro'];?>">
                            <i class="fa fa-book"></i>
                            </button>
                        </div>
                        
                    </div>                    
                </div>

                <div class="modal fade" id="informacoes<?php echo $dados['codigo_livro'];?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?php echo $dado['titulo'];?></h5>
                                <button type="hidden" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="dados-livro-avaliar">
                                    <div class="img-avaliar w-25">
                                        <img src="/public/static/imagens/amoregelato.jpg">
                                    </div>       
                                    <div class="dados-avaliar w-75">
                                    <p><span>Sinopse:</span><?php echo $dado['sinopse'];?></p>
                                        <p><span>Autor:</span><?php echo $dado['titulo'];?></p>
                                        <p><span>Editora:</span><?php echo $dado['editora'];?></p>
                                        <p><span>Páginas:</span><?php echo $dado['qtd_paginas'];?></p>
                                        <p><span>Nota:</span><?php echo $dado['nota'];?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer btn-conclui-cadastro" >
                                <button type="button" class="btn btn-pesquisa-bibliotecario" data-bs-dismiss="modal">Voltar</button>
                                <form action="../views/avaliarLivro.php" method="POST">
                                    <input  type="hidden" name="codigo_livro" value="<?php echo $dado['codigo'];?>">
                                    <button type="submit" class="btn btn-pesquisa-bibliotecario" name="avaliacoes">Avaliações</button>
                                </form>
                            </div> 
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
            
            <footer class="footer">

                <div class="div-footer">
                    <div>
                        <img src="imagens/athenas-preto-branco.png">
                    </div>
                    
                    <div class="icon-footer">
                        <a href="https://github.com/deborabuzatto" target="_blank">
                            <i class="fa fa-github hover-opacity"></i>
                        </a>

                        <a href="" target="_blank">
                            <i class="fa fa-linkedin hover-opacity"></i>
                        </a>

                        <a href="" target="_blank">
                            <i class="fa fa-whatsapp hover-opacity"></i>
                        </a>

                        <a href="" target="_blank">
                            <i class="fa fa-google hover-opacity"></i>
                        </a>
                    </div>

                    <div>
                        <a href="https://goo.gl/maps/zGGbKuK77NsXjuFe6" target="_blank">
                            Av. Fernando Ferrari, 1080.<br> 
                            Ed. Centro Empresarial, Torre Central, sala 604.<br>
                            Mata da Praia. Vitória - ES, 29066-380
                        </a>
                    </div>
                </div>

            </footer>
        </div>

        <!-- Script FontAwesome -->
        <script src="https://kit.fontawesome.com/a9ac96b7ba.js" crossorigin="anonymous"></script>

        <!-- Script Boostrap-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    </body>
</html>