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
                        <label for="nomeContato" class="form-label">Título:</label>
                        <input type="text" class="form-control" id="nomeContato">
                    
                        <label for="senhaLogin" class="form-label">Data de publicação:</label>
                        <input type="date" class="form-control" id="senhaLogin" > 
                        

                        <label for="senhaLogin" class="form-label">ISBN:</label>
                        <input type="text" class="form-control" id="senhaLogin" > 
                    </div>

                    <div class="input-selecionar">
                        <label for="nomeContato" class="form-label">Título:</label>
                        <input type="text" class="form-control" id="nomeContato">
                
                        <label for="Nacionalidade" class="form-label">Nacionalidade do autor:</label>
                        <input type="text" class="form-control " id="Nacionalidade">
                    </div>

                    <div class="input-selecionar">
                        <label for="senhaLogin" class="form-label">Categoria:</label>
                        <select class="form-select" name="Categoria" >
                            <option value="2">Romance</option>
                            <option value="3">Literatura estrangeira</option>
                            <option value="4">Fantasia</option>
                            <option value="5">Terror</option>
                            <option value="6">Suspense</option>
                            <option value="7">Clássico</option>
                            <option value="8">Poesia</option>
                        </select>

                        <span>
                            <button class="btn btn-pesquisa-bibliotecario">Cadastrar categoria</button>
                        </span> 
                    </div>
                    
                    
                    
                    <div class="input-selecionar ">
                        <label for="senhaLogin" class="form-label">Importar capa:</label>
                        <input type="file" class="form-control" id="nomeContato" placeholder="Imagem da capa">
                    </div>
                    

                    <div class="input-textarea">
                        <label for="textArea" class="form-label">Sinopse:</label>
                        <textarea type="email" class="form-control" id="textArea"></textarea>
                    </div>

                    <div class="btn-conclui-cadastro">
                        <button class="btn btn-pesquisa-bibliotecario">Concluir Cadastro do Livro</button>
                    </div> 
                    
                </form>
            </div>


            <footer class="footer">

                <div class="div-footer">
                    <div>
                        <img src="/public/static/imagens/athenas-preto-branco.png">
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