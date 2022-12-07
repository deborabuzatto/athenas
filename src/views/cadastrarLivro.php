<?php 
    include_once '../models/classLivro.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../components/header.php'; ?>
        <title>CADASTRO DE LIVROS</title>
    </head>
    <body>
        <div class="nav-login">
            <div class="nav-link-item">
                <a href="homeBibliotecario.php"><i class="fa fa-arrow-left-long"></i>Página Inicial</a>
            </div>

            <div class="page-info-name">
                <p>Você está na página:</p><a href="#">Cadastro de livros</a>
            </div>

            <div class="nav-login-menu">
                <img src="/public/static/imagens/athenas.png">
                <p>"A leitura desenvolve a mente. O pensamento a alma."</p>
            </div>
        </div> 
            
        <div class="cadastrar-livro">
            <form enctype="multipart/form-data" method="POST" action="../services/cadastrarLivro.php">
                <div class="input-nomes">
                    <label for="titulo" class="form-label">Título:</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" required>

                    <label for="editora" class="form-label">Editora:</label>
                    <input type="text" class="form-control" id="editora" name="editora" required>
                
                    <label for="senhaLogin" class="form-label">Data de publicação:</label>
                    <input type="date" class="form-control" id="senhaLogin" name="data_publicacao" required> 
                    
                    <label for="senhaLogin" class="form-label">ISBN:</label>
                    <input type="text" class="form-control" id="senhaLogin" name="ISBN" required> 
                
                    <label for="nomeContato" class="form-label">Autor:</label>
                    <input type="text" class="form-control" id="nomeContato" name="autor" required>
            
                    <label for="Nacionalidade" class="form-label">Nacionalidade do autor:</label>
                    <input type="text" class="form-control " id="Nacionalidade" name="nacionalidade" required>
                </div>

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

                <div class="input-selecionar ">
                    <label for="importar" class="form-label">Importar capa:</label>
                    <input type="file" class="form-control" placeholder="Imagem da capa" name="file" required>
                </div>
                
                <div class="input-textarea">
                    <label for="sinopse" class="form-label">Sinopse:</label>
                    <textarea type="text" class="form-control" id="sinopse" name="sinopse" required></textarea>
                </div>

                <div class="btn-conclui-cadastro">
                    <button class="btn btn-pesquisa-bibliotecario" name="btn-cadastrar">Concluir Cadastro do Livro</button>
                </div> 
                
            </form>
        </div>
        
        <?php include '../components/footer.php'; ?>
        <?php include '../components/scriptsBody.php';?>
    </body>
</html>