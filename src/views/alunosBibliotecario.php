<?php 
//Classe Aluno
include_once '../models/classAluno.php';
session_start();


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            include '../components/header.php';
        ?>
        <title>Todos os Alunos</title>
    </head>
    <body>
        <div class="nav-login">
            <div class="nav-link-item">
                <a href="homeBibliotecario.php"><i class="fa fa-arrow-left-long"></i>Página Inicial</a>
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

            <div class="centralizar-livro">
                <div class="div-livro-locacao livro"  data-bs-toggle="modal" data-bs-target="#informacoes<?php echo $dados['codigo_livro'];?>">
                    <div class="img-pessoa1"><img src="../components/dinamic/<?php echo $dados['img_capa'];?>"></div>
                    <div class="table-conteudo">
                        <h4><?php echo $dados['nome'];?></h4>
                        <p><span>Username:</span><?php echo $dados['username'];?></p>
                        <p><span>Data de nascimento:</span><?php echo $dados['data_nasc'];?></p>
                        <p><span>E-mail:</span><?php echo $dados['email'];?></p>
                    </div>
                    <button type="button" class="btn btn-plus" data-bs-toggle="modal" data-bs-target="#editar<?php echo $dados['codigo_pessoa'];?>"><i class="fa fa-pencil"></i></button>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="editar<?php echo $dados['codigo_pessoa'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Livro</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="cadastrar-livro">
                                    <form method="POST" action="../services/editarAluno.php">
                                        <div class="input-nomes">
                                            <input type="hidden" class="form-control" id="codigo_pessoa" name="codigo_pessoa" value="<?php echo $dados['codigo_pessoa'];?>">

                                            <label for="nomeContato" class="form-label">Nome completo:</label>
                                            <input type="text" class="form-control" id="nomeContato" name="nome" value="<?php echo $dados['nome'];?>">

                                            <label for="nomeContato" class="form-label">Nome de usuário:</label>
                                            <input type="text" class="form-control" id="nomeContato" name="username" value="<?php echo $dados['username'];?>">
                                        
                                            <label for="senhaLogin" class="form-label">Data de nascimento:</label>
                                            <input type="date" class="form-control" id="senhaLogin" name="data_nasc" value="<?php echo $dados['data_nasc'];?>"> 

                                            <label for="email" class="form-label">E-mail:</label>
                                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $dados['email'];?>">
                                        </div>
                                        <div class="modal-footer btn-conclui-cadastro" >
                                            <div type="button" class="btn-conclui-cadastro">
                                                <button class="btn btn-pesquisa-bibliotecario" name="btn-editar">Concluir Edição do Livro</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
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
            <div class="centralizar-livro">
                <div class="div-livro-locacao livro"  data-bs-toggle="modal" data-bs-target="#informacoes<?php echo $dados['codigo_livro'];?>">
                    <div class="img-pessoa1"><img src="../components/dinamic/<?php echo $dados['img_perfil'];?>"></div>
                    <div class="table-conteudo">
                        <h4><?php echo $dados['nome'];?></h4>
                        <p><span>Username:</span><?php echo $dados['username'];?></p>
                        <p><span>Data de nascimento:</span><?php echo $dados['data_nasc'];?></p>
                        <p><span>E-mail:</span><?php echo $dados['email'];?></p>
                    </div>
                    <div class="status">
                        <button type="button" class="btn btn-plus" data-bs-toggle="modal" data-bs-target="#editar<?php echo $dados['codigo_pessoa'];?>"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-plus" data-bs-toggle="modal" data-bs-target="#excluir<?php echo $dados['codigo_pessoa'];?>"><i class="fa fa-trash"></i></button>
                    </div>
                </div>
            </div>

                <!-- Modal -->
                <div class="modal fade" id="editar<?php echo $dados['codigo_pessoa'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Livro</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="cadastrar-livro">
                                    <form method="POST" action="../services/editarAluno.php">
                                        <div class="input-nomes">
                                            <input type="hidden" class="form-control" id="codigo_pessoa" name="codigo_pessoa" value="<?php echo $dados['codigo_pessoa'];?>">

                                            <label for="nomeContato" class="form-label">Nome completo:</label>
                                            <input type="text" class="form-control" id="nomeContato" name="nome" value="<?php echo $dados['nome'];?>">

                                            <label for="nomeContato" class="form-label">Nome de usuário:</label>
                                            <input type="text" class="form-control" id="nomeContato" name="username" value="<?php echo $dados['username'];?>">
                                        
                                            <label for="senhaLogin" class="form-label">Data de nascimento:</label>
                                            <input type="date" class="form-control" id="senhaLogin" name="data_nasc" value="<?php echo $dados['data_nasc'];?>"> 

                                            <label for="email" class="form-label">E-mail:</label>
                                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $dados['email'];?>">
                                        </div>
                                        <div class="modal-footer btn-conclui-cadastro" >
                                            <div type="button" class="btn-conclui-cadastro">
                                                <button class="btn btn-pesquisa-bibliotecario" name="btn-editar">Concluir Edição do Livro</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="excluir<?php echo $dados['codigo_pessoa'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">excluir Livro</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                
                                <div class="cadastrar-livro">
                                    
                                    <p>Deseja realmente excluir o usuario <?php echo $dados['nome'];?>?</p>
                                    <div>
                                    <form method="POST" action="../services/excluirAluno.php">
                                        
                                        <input type="hidden" class="form-control" id="codigo_pessoa" name="codigo_pessoa" 
                                        value="<?php echo $dados['codigo_pessoa'];?>">
                                        
                                        <div type="button" class="btn-conclui-cadastro">
                                            <button class="btn btn-pesquisa-bibliotecario" name="btn-excluir">Excluir Aluno</button>
                                        </div>
                                        
                                    </form>
                        </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            
            
            <?php
            }
            endif;
            endif;
            ?>
            
        </div>
        
        <?php 
            include '../components/footer.php';
        ?>
        <?php 
            include '../components/scriptsBody.php';
        ?>
    </body>
</html>