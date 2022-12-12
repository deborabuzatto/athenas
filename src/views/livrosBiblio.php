<?php 
    include_once '../models/classLivro.php';

    $livro = new Livro();
    if(isset($_POST['btn-buscar'])){
        $pesquisar = $_POST['pesquisar'];
        $palavra = '%' . $pesquisar. '%'; 
        $imprimir = $livro->buscarLivro($palavra);
    }else{
        $imprimir = $livro->findAllLivro();
    }
    if(!empty($imprimir)){
        foreach($imprimir as $dados){
            $id = $dados['codigo_livro'];
            $imprime = $livro->listarTodosDadosLivro($id);
            foreach($imprime as $dado){
?>
<div class="div-livro-externo"  data-bs-toggle="modal" data-bs-target="#informacoes<?php echo $dados['codigo_livro'];?>">
    <div><img src="../components/dinamic/<?php echo $dados['img_capa'];?>"></div>
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
            <span><?php echo $dado['categoria'];?></span>
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

<!-- INFORMAÇÕES LIVRO -->
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
                        <img src="../components/dinamic/<?php echo $dados['img_capa'];?>">
                    </div>       
                    <div class="dados-avaliar w-75">
                        <p><span>Sinopse:</span><?php echo $dado['sinopse'];?></p>
                        <p><span>Autor:</span><?php echo $dado['escritor'];?></p>
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
                <button class="btn btn-pesquisa-bibliotecario" data-bs-dismiss="modal" title="Voltar"><i class="fa fa-arrow-left"></i></button>
                <form action="../views/avaliacoes.php" method="POST">
                    <input  type="hidden" name="codigo_livro" value="<?php echo $dado['codigo'];?>">
                    <button type="submit" class="btn btn-pesquisa-bibliotecario" name="avaliacoes" title="Avaliações"><i class="fa fa-star"></i></button>
                </form>
                <button class="btn btn-pesquisa-bibliotecario" title="Registrar Locação" data-bs-toggle="modal" data-bs-target="#locar<?php echo $dados['codigo_livro'];?>"><i class="fa fa-book-open-reader"></i></button>
                <button class="btn btn-pesquisa-bibliotecario" title="Editar livro" data-bs-toggle="modal" data-bs-target="#editar<?php echo $dados['codigo_livro'];?>"><i class="fa fa-pencil"></i></button>
                <button class="btn btn-pesquisa-bibliotecario" title="Excluir livro" data-bs-toggle="modal" data-bs-target="#excluir<?php echo $dados['codigo_livro'];?>"><i class="fa fa-trash"></i></button>
            </div> 
        </div>
    </div>
</div>

<!-- EXCLUIR LIVRO -->
<div class="modal fade" id="excluir<?php echo $dados['codigo_livro'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">excluir Livro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="cadastrar-livro">
                    <p>Deseja realmente excluir o livro <?php echo $dados['titulo'];?>?</p>
                </div>
            </div>
            <div class="modal-footer btn-conclui-cadastro" >
                <form method="POST" action="../services/excluirLivro.php">
                    <input type="hidden" class="form-control" id="codigo_livro" name="codigo_livro" 
                    value="<?php echo $dados['codigo_livro'];?>">
                    
                    <div type="button" class="btn-conclui-cadastro">
                        <button class="btn btn-pesquisa-bibliotecario" name="btn-excluir">Excluir Livro</button>
                    </div>                                         
                </form>
            </div>
        </div>
    </div>
</div>

<!-- LOCAR LIVRO -->
<div class="modal fade" id="locar<?php echo $dados['codigo_livro'];?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Você selecionou o livro: <?php echo $dados['titulo'];?></h5>
                <button type="hidden" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../views/locacao.php" method="POST">
                <div class="modal-body">
                    <input  type="hidden" name="codigo_livro" value="<?php echo $dados['codigo_livro'];?>">
                    <label for="nomes" class="form-label">Digite o nome do aluno para continuar:</label>
                    <input type="text" id="nomes" class="form-control" name="pesquisar">
                </div>
                <div class="modal-footer btn-conclui-cadastro" >
                    <button type="button" class="btn btn-pesquisa-bibliotecario" data-bs-dismiss="modal">Voltar</button>
                    <button type="submit" class="btn btn-pesquisa-bibliotecario" name="btn-locacao">Locar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- EDITAR LIVRO -->
<div class="modal fade" id="editar<?php echo $dados['codigo_livro'];?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $dados['titulo'];?></h5>
                <button type="hidden" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../services/editarLivro.php" method="POST">
                <div class="modal-body">
                    <input  type="hidden" name="codigo_livro" value="<?php echo $dados['codigo_livro'];?>">

                    <label for="titulo" class="form-label">Título:</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value='<?php echo $dado['titulo'];?>'>

                    <label for="editora" class="form-label">Editora:</label>
                    <input type="text" class="form-control" id="editora" name="editora" value='<?php echo $dado['editora'];?>'>
                
                    <label for="senhaLogin" class="form-label">Data de publicação:</label>
                    <input type="date" class="form-control" id="senhaLogin" name="data_publicacao" value='<?php echo $dado['data_publicacao'];?>'> 

                    <label for="senhaLogin" class="form-label">ISBN:</label>
                    <input type="text" class="form-control" id="senhaLogin" name="ISBN" value='<?php echo $dado['isbn'];?>' > 

                    <label for="nomeContato" class="form-label">Autor:</label>
                    <input type="text" class="form-control" id="nomeContato" name="autor" value='<?php echo $dado['escritor'];?>'>
            
                    <label for="Nacionalidade" class="form-label">Nacionalidade do autor:</label>
                    <input type="text" class="form-control " id="Nacionalidade" name="nacionalidade" 
                    value='<?php echo $dado['nacionalidade'];?>'>
                    
                    <div class="input-selecionar">
                        <label for="senhaLogin" class="form-label">Categoria:</label>
                        <select class="form-select" name="categoria" >
                            <?php
                                $livro = new Livro();
                                $imprimir = $livro->listarCategoria();
                                if(count($imprimir)>0):
                                    foreach($imprimir as $dados){
                            ?>
                            <option value="<?php echo $dados['codigo_categoria']?>"><?php echo $dados['dsc_categoria']?></option>

                            <?php
                                }
                                endif;
                            ?>
                        </select>
                    </div>

                    <div class="input-selecionar">
                        <label for="importar" class="form-label">Importar capa:</label>
                        <input type="file" class="form-control" id="importar" placeholder="Imagem da capa" name="importar">
                    </div>

                    <div class="input-textarea">
                        <label for="sinopse" class="form-label">Sinopse:</label>
                        <textarea type="text" class="form-control" id="sinopse" name="sinopse" value='<?php echo $dado['sinopse']?>'></textarea>
                    </div>
                </div>
                <div class="modal-footer btn-conclui-cadastro" >
                    <button type="button" class="btn btn-pesquisa-bibliotecario" data-bs-dismiss="modal">Voltar</button>
                    <button type="submit" class="btn btn-pesquisa-bibliotecario" name="btn-editar">Editar livro</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php }}} else{ echo '<h1 class="text-danger mt-5 mb-5">Nenhum livro encontrado.</h1>'; } ?>