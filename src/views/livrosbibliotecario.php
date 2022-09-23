<?php 
//Classe Aluno
include '../models/classLivro.php';
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <title>Teste 1</title>
    </head>
    <body>
        <div class="tela">
            <div class="nav-login">
                <div class="nav-link-item">
                    <a href="homeAlunos.html"><i class="fa fa-arrow-left-long"></i>Página Inicial</a>
                </div>

                <div class="page-info-name">
                    <p>Você está vendo:</p><a href="#">Todos os Livros</a>
                </div>

                <div class="nav-login-menu">
                    <img src="/public/static/imagens/logolaranja.png">
                    <p>"A leitura desenvolve a mente. O pensamento a alma."</p>
                </div>
            </div>

            
            <div class="conteudo-livro-page">
                <div class="busca-livro-page">
                    <form method="post" action='#'>
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

                        <span>
                            <button class="btn btn-pesquisa" name="btn-adicionar">Adicionar</button>
                        </span>
                    </form>
                </div>

                <?php
                    if(isset($_POST['btn-adicionar'])){
                        header('Location: cadastrarAluno.php');
                    }

                    if(isset($_POST['btn-buscar'])){
                        $pesquisar = $_POST['pesquisar'];
                        $palavra = '%' . $pesquisar. '%';
                    
                        $livro = new Livro();
                        $busca = $livro->buscarLivro($palavra);
                        if(count($busca)>0){
                            foreach($busca as $dados){
                        
                ?>

                <div class="table-livro-aluno">
                    <div>
                        <div>
                            <img src="/public/static/imagens/amoregelato.jpg">
                        </div>
                        <div class="table-conteudo">
                            <h4><?php echo $dados['titulo'];?></h4>
                            
                            <p class="disponibilidade">Disponivel</p>
                            <p class="categoria">Romance</p>

                            <p class="sinopse" ><?php echo $dados['sinopse'];?></p>
                        </div>
                    </div>                    
                </div>
                
                <?php
                }}}
                else{
                    $livro = new Livro();
                    $imprimir = $livro->findAllLivro();
                    if(count($imprimir)>0):
                        foreach($imprimir as $dados){
                ?>

                <div class="table-livro-aluno">
                    <div>
                        <div>
                            <img src="/public/static/imagens/amoregelato.jpg">
                        </div>
                        <div class="table-conteudo">
                            <input type="hidden" name='batata' value='<?php echo $dados['codigo_livro'];?>'>

                            <h4><?php echo $dados['titulo'];?></h4>
                            
                            <p class="disponibilidade">Disponivel</p>
                            <p class="categoria">Romance</p>

                            <p class="sinopse"><?php echo $dados['sinopse'];?></p>

                            <a href="#informacoes" name="informacao" class="informacoes btn btn-icone-table" data-bs-toggle="modal" 
                            data-bs-target="#informacoes" data-cod="<?php echo $dados['codigo_livro'];?>">
                            <i class="fa fa-file-lines"></i></a> 

                            <a href="#editar" class=" editar btn btn-icone-table" data-bs-toggle="modal" data-bs-target="#editar" data-ida="<?php echo $dados['codigo_livro'];?>"><i class="fa fa-pen"></i></a> 
                            
                            <td><a href="#excluir" class="excluir btn btn-icone-table" data-bs-toggle="modal" data-bs-target="#excluir" data-id="<?php echo $dados['codigo_livro'];?>"><i class="fa fa-trash"></i></a> 
                        </div>
                    </div>                    
                </div>

                <?php
                }
                endif;
                }
                function batata() {
                    $id = 4;
                    return $id;
                }
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
                    $livro = new Livro();
                    $imprimir = $livro->findAll();
                    if(count($imprimir)>0):
                        foreach($imprimir as $dados){
                ?>

                <div class="table-livro-aluno">
                    <div>
                        <div class="table-conteudo">
                        <input id='1' type='text' value='<?php echo $dados['codigo_livro'];?>'>
                        <input id='2' type='text' value='<?php echo $dados['sinopse'];?>'>
                        <input id='3' type='text' value='<?php echo $dados['titulo'];?>'>
                        <input id='4' type='text' value='<?php echo $dados['ISBN'];?>'>
                        <input id='5' type='text' value='<?php echo $dados['editora'];?>'>
                        <input id='6' type='text' value='<?php echo $dados['categoria'];?>'>
                        <input id='7' type='text' value='<?php echo $dados['data_publicacao'];?>'>
                        <input id='8' type='text' value='<?php echo $dados['autor'];?>'>    
                    </div>                    
                </div>

                <?php
                }
                endif;
                ?>

            
            <?php 
                include '../components/footer.php';
            ?>

        </div>
            <!-- Modal -->
            <div class="modal fade" id="informacoes" tabindex="-1" aria-text="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form id="formId" method="post" action="modal.php">
                            <input type="text" name="infoHidden" id="infoHidden" class="text-dark">
                        </form>
                        
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="dados-livro-avaliar">
                                <div class="img-avaliar w-25">
                                    <img src="/public/static/imagens/amoregelato.jpg">
                                </div>
                                
                                <div class="dados-avaliar w-75">
                                    <p><span>Sinopse:</span></p>
                                    <p><span>Autor:</span></p>
                                    <p><span>Editora:</span>Letares</p>
                                    <p><span>ISBN:</span>198890675-17</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer btn-conclui-cadastro" >
                            <button type="button" class="btn btn-pesquisa-bibliotecario" data-bs-dismiss="modal">Voltar</button>
                            <button type="button" class="btn btn-pesquisa-bibliotecario" name="avaliacoes">Avaliações</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        
        <script type="text/javascript">
            $('.informacoes').on('click', function(event){
                event.preventDefault();
                $('#informacoes').modal;
                var id = $(this).data('cod');  // vamos buscar o valor do atributo data-id
                $('#infoHidden').val(id); // atribui o id ao input hidden

                var input1 = $('#2').val();
                console.log(input1);



                /*var chamado = $("#infoHidden").val();
                $.post(
                    '#formID', {
                    type: 'POST',
                    url: 'modal.php',
                    data: {
                        chamado,
                    },
                    function (response) {
                        console.log(chamado);
                        alert('Post realizado');
                    },
                });*/
            });
            /*$('.editar').on('click', function(){
                var id = $(this).data('ida'); // vamos buscar o valor do atributo data-id
                var nome = $(this).data('nome');
                var username = $(this).data('username');
                var email = $(this).data('email');
                $('#editarHidden').val(id); // atribui o id ao input hidden
                $('#editar').modal('show'); // modal aparece
                $('#nome').val(nome);
                $('#usuario').val(username);
                $('#email').val(email);
            });
            '#formID', {
                        type:"POST",
                        infoHidden: chamado,
                    },

            $('.excluir').on('click', function(){
                var id = $(this).data('id'); // vamos buscar o valor do atributo data-id
                $('#excluirHidden').val(id); // atribui o id ao input hidden
                $('#excluir').modal('show'); // modal aparece
            });*/
        </script>

        <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"
        ></script>

        <!-- Script FontAwesome -->
        <script src="https://kit.fontawesome.com/a9ac96b7ba.js" crossorigin="anonymous"></script>

        <!-- Script Boostrap-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    </body>
</html>