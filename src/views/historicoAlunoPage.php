<?php
    include '../models/classLivro.php';
    session_start();
    $aluno = $_SESSION['nome_aluno'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../components/header.php'; ?>
        <title>MEU HISTÓRICO</title>
    </head>
    <body>
        <div class="nav-login">
            <div class="nav-link-item">
                <a href="homeAlunos.php"><i class="fa fa-arrow-left-long"></i>Página Inicial</a>
            </div>

            <div class="page-info-name">
                <p>Você está vendo:</p><a href="#">Seu histórico</a>
            </div>

            <div class="nav-login-menu">
                <img src="/public/static/imagens/athenas.png">
                <p>"A leitura desenvolve a mente. O pensamento a alma."</p>
            </div>
        </div>

        <div class="conteudo-livro-page">
            <?php
                $historico = new Livro();
                $busca = $historico->listarHistorico($aluno);
                if(empty($busca)){
            ?>
            <div>
                <div class="erro-historico">
                    <h2>você ainda leu nenhuma obra :(</h2>
                    <p>Que tal começar agora? <a href="homeAlunos.php">Procurar Obras</a></p>
                </div>
            </div>
            <?php
            }else{
                foreach($busca as $dados){
                    $id = $dados['codigo_livro'];
                    $todos = new Livro();
                    $imprime = $todos->listarTodosDadosLivro($id);
                    foreach($imprime as $dado){
            ?>
            <div class="div-livro-externo" data-bs-toggle="modal" data-bs-target="#informacoes<?php echo $dados['codigo_livro'];?>">
                <div><img src="../components/dinamic/<?php echo $dado['img_capa'];?>"></div>
                <div class="table-conteudo">
                    <h4><?php echo $dados['titulo'];?></h4>
                    <p class="sinopse"><?php echo $dados['sinopse']; echo' . . . ';?></p>
                </div>
                <div class="status">
                    <div>
                        <?php
                            $livro = new Livro();
                            $codigo_livro = $dados['codigo_livro']; 
                            $disponibilidade = $livro->disponibilidade($codigo_livro);
                            if($disponibilidade['valor'] === "0"){
                        ?>
                            <i class="fa-regular fa-circle-check"></i>
                            <span>Disponível</span>
                        <?php
                            } else{   
                        ?>
                            <i class="fa-regular fa-circle-xmark"></i>
                            <span>Indisponível</span>
                        <?php
                        }
                        ?>
                    </div>
                    <div>
                        <i class="fa-regular fa-bookmark"></i>
                        <span><?php echo $dados['categoria'];?></span>
                    </div>
                    <div>
                        <i class="fa fa-ranking-star"></i>
                        <span>
                            <?php
                            if(empty($dado['nota'])){
                                echo 'não avaliado';
                            }else{
                                echo $dado['nota'];
                            }
                            ?>
                        </span>
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
                                <div class="img-avaliar w-25"><img src="../components/dinamic/<?php echo $dado['img_capa'];?>"></div>       
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
            <?php }}} ?>
        </div>
            
        <?php include '../components/footer.php'; ?>
        <?php include '../components/scriptsBody.php'; ?>
     </body>
</html>