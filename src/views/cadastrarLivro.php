<?php 
    include_once '../models/classLivro.php';
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
        <link href="https://fonts.googleapis.com/css2?family=Piazzolla:opsz,wght@8..30,200;8..30,300&display=swap" rel="stylesheet">

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
                    <p>Você está na página:</p><a href="#">Cadastro de livros</a>
                </div>

                <div class="nav-login-menu">
                    <img src="/public/static/imagens/logolaranja.png">
                    <p>"A leitura desenvolve a mente. O pensamento a alma."</p>
                </div>
            </div>

            
            
            <div class="cadastrar-livro">
                <form method="post" action="../services/cadastrarLivro.php">
                    <div class="input-nomes">
                        <label for="titulo" class="form-label">Título:</label>
                        <input type="text" class="form-control" id="titulo" name="titulo">
                    
                        <label for="senhaLogin" class="form-label">Data de publicação:</label>
                        <input type="date" class="form-control" id="senhaLogin" name="data_publicacao"> 
                        

                        <label for="senhaLogin" class="form-label">ISBN:</label>
                        <input type="text" class="form-control" id="senhaLogin" name="ISBN" > 
                    
                        <label for="nomeContato" class="form-label">Autor:</label>
                        <input type="text" class="form-control" id="nomeContato" name="autor">
                
                        <label for="Nacionalidade" class="form-label">Nacionalidade do autor:</label>
                        <input type="text" class="form-control " id="Nacionalidade" name="nacionalidade">
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
                        
                        <label for="addcategoria" class="form-label">addcategoria:</label>
                        <input type="text" class="form-control " id="addcategoria" name="addcategoria">

                        <span>
                            <button class="btn btn-pesquisa-bibliotecario" >Cadastrar categoria</button>
                        </span> 
                    </div>
                    
                    
                    
                    <div class="input-selecionar ">
                        <label for="importar" class="form-label">Importar capa:</label>
                        <input type="file" class="form-control" id="importar" placeholder="Imagem da capa" name="importar">
                    </div>
                    

                    <div class="input-textarea">
                        <label for="sinopse" class="form-label">Sinopse:</label>
                        <textarea type="email" class="form-control" id="sinopse" name="sinopse"></textarea>
                    </div>

                    <div class="btn-conclui-cadastro">
                        <button class="btn btn-pesquisa-bibliotecario" name="btn-cadastrar">Concluir Cadastro do Livro</button>
                    </div> 
                    
                </form>

                
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