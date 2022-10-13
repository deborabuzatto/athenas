<?php 
include_once '../models/classLivro.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            include '../components/header.php';
        ?>
        <title>Ranking de Notas</title>
    </head>
    <body>
        <div class="tela">
            <div class="nav-login">
                <div class="nav-link-item">
                    <a href="homeAlunos.php"><i class="fa fa-arrow-left-long"></i>Página Inicial</a>
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
                        
                        <select class="form-select" name="categoria" >
                            
                            <?php
                                $livro = new Livro();
                                $imprimir = $livro->listarCategoria();
                                if(count($imprimir)>0):
                                    foreach($imprimir as $dados){
                            ?>
                            <option name="categoria" value="<?php echo $dados['dsc_categoria']?>"><?php echo $dados['dsc_categoria']?></option>

                            <?php
                                }
                                endif;
                            ?>
                        </select>

                        <span>
                            <button class="btn btn-pesquisa" name="btn-buscar">Pesquisar</button>
                        </span>
                    </form>
                </div>

                <?php
                    if(isset($_POST['btn-buscar'])){
                        $pesquisar = $_POST['pesquisar'];
                        if(empty($pesquisar)){
                            $pesquisar = $_POST['categoria'];
                        }
                        $palavra = '%' . $pesquisar. '%';
                        $livro = new Livro();
                        $busca = $livro->buscarLivro($palavra);
                        if(count($busca)>0){
                            foreach($busca as $dados){
                                $id = $dados['codigo_livro'];
                                $imprime = $livro->listarTodosDadosLivro($id);
                                foreach($imprime as $dado){      
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
                            <p class="categoria"><?php
                                if(empty($dado['nota'])){
                                    echo 'não avaliado';
                                }else{
                                    echo $dado['nota'];
                                }
                            ?></p>
                            <p class="sinopse"><?php echo $dados['sinopse'];?></p>
                            <button type="button" class="btn-comprido" data-bs-toggle="modal" data-bs-target="#informacoes<?php echo $dados['codigo_livro'];?>">Ver mais informacoes</button>
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
                                        <p><span>Nota:</span>
                                        <?php 
                                            if(empty($dado['nota'])){
                                                echo 'não avaliado';
                                            }else{
                                                echo $dado['nota'];
                                            }
                                        ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer btn-conclui-cadastro" >
                                <button type="button" class="btn btn-pesquisa-bibliotecario" data-bs-dismiss="modal">Voltar</button>
                                <form action="../views/avaliacoes.php" method="POST">
                                    <input  type="hidden" name="codigo_livro" value="<?php echo $dado['codigo'];?>">
                                    <button type="submit" class="btn btn-pesquisa-bibliotecario" name="avaliacoes">Avaliações</button>
                                </form>
                            </div> 
                        </div>
                    </div>
                </div>
                
                <?php
                }}}}
                else{
                    $livro = new Livro();
                    $imprimir = $livro->rankingNota();
                    
                    if(count($imprimir)>0){
                        foreach($imprimir as $dados){
                            $id = $dados['codigo'];
                            $imprime = $livro->listarTodosDadosLivro($id);
                            foreach($imprime as $dado){
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
                                $codigo_livro = $dados['codigo']; 
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
                            <p class="categoria"><?php 
                                if(empty($dado['nota'])){
                                    echo 'não avaliado';
                                }else{
                                    echo $dado['nota'];
                                }
                            ?></p>
                            <p class="sinopse"><?php echo $dados['sinopse'];?></p>
                            <button type="button" class="btn-comprido" data-bs-toggle="modal" data-bs-target="#informacoes<?php echo $dados['codigo'];?>">Ver mais informacoes</button>
                        </div>
                    </div>                    
                </div>
                

                
                
                <div class="modal fade" id="informacoes<?php echo $dados['codigo'];?>" tabindex="-1" aria-hidden="true">
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
                                        <p><span>Nota:</span>
                                        <?php 
                                            if(empty($dado['nota'])){
                                                echo 'não avaliado';
                                            }else{
                                                echo $dado['nota'];
                                            }
                                        ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer btn-conclui-cadastro" >
                                <button type="button" class="btn btn-pesquisa-bibliotecario" data-bs-dismiss="modal">Voltar</button>
                                <form action="../views/avaliacoes.php" method="POST">
                                    <input  type="hidden" name="codigo_livro" value="<?php echo $dado['codigo'];?>">
                                    <button type="submit" class="btn btn-pesquisa-bibliotecario" name="avaliacoes">Avaliações</button>
                                </form>
                            </div> 
                        </div>
                    </div>
                </div>



                <?php
                }}}}
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
                include '../components/footer.php'
            ?>
            
        </div>

        <!-- Script FontAwesome -->
        <script src="https://kit.fontawesome.com/a9ac96b7ba.js" crossorigin="anonymous"></script>

        <!-- Script Boostrap-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    </body>
</html>
