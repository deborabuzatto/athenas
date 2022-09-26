<?php
    include '../models/classLivro.php';
    session_start();
//Iniciar  Sessão
echo $_SESSION['nome_aluno'];

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

        <title>VER AVALIAÇÕES</title>
    </head>
    <body>
        <div class="tela">
            
            <div class="nav-login">
                <div class="nav-link-item">
                    <a href="index.html"><i class="fa fa-arrow-left-long"></i>Página Inicial</a>
                </div>

                <div class="page-info-name">
                    <p>Você está na página:</p><a href="#">Avaliar Livro</a>
                </div>

                <div class="nav-login-menu">
                    <img src="/public/static/imagens/logolaranja.png">
                    <p>"A leitura desenvolve a mente. O pensamento a alma."</p>
                </div>
            </div>

            <?php 
                $livro = new Livro();
                $busca = $livro->listarTodosDadosLivro(2);
                if(count($busca)>0):
                    foreach($busca as $dados){
            ?>

            
            <div class="cadastrar-livro">
                <div class="dados-livro-avaliar">
                    <div class="img-avaliar">
                        <img src="/public/static/imagens/amoregelato.jpg">
                    </div>
                    <div class="dados-avaliar">
                        <h4><?php echo $dados['titulo'];?></h4>
                        
                        <p><span>Autor:</span><?php echo $dados['nome'];?></p>
                        <p><span>Editora:</span><?php echo $dados['titulo'];?></p>
                        <p><span>ISBN:</span><?php echo $dados['ISBN'];?></p>
                        <p><span>Sinopse:</span><?php echo $dados['sinopse'];?></p>

                    </div>
                    
                </div>
                
                <div class="form-avalia">
                    <form method='post' action='../services/avaliarLivro.php'>
                        <div class="input-textarea mb-3">
                            <label for="textArea" class="form-label">Descreva sua experiência:</label>
                            <textarea type="text" class="form-control" id="dsc_comentario" name="dsc_comentario" placeholder="máximo de 250 caracteres"></textarea>
                            <input type="hidden" id="dsc_comentario" name="codigo_livro" value="<?php echo $dados['codigo_livro'];?>" >
                        </div>

                        <div class="input-nomes">
                            <label for="nomeContato" class="form-label">Nota:</label>
                            <input type="text" class="form-control" id="nota" name="nota" placeholder="avalie de 1 à 5">                        
                        </div>
                        <div class="btn-conclui-cadastro">
                            <button class="btn btn-pesquisa-bibliotecario" name='btn_avalia'>Concluir Avaliação</button>
                        </div>
                    </form>
                </div>


                <?php 
                }
                endif; 
                ?>

                <div class="link-avaliacoes">
                    <a href="#avaliacoes">Ver outras Avaliações</a>
                </div>             
            </div>

            <?php 
                //if(isset($_POST['btn-avaliar'])):
                    //$id = $_POST['input_hidden'];
                    
                    $livro = new Livro();
                    $busca = $livro->listarAvaliacoes(2);
                    if(count($busca)>0):
                        foreach($busca as $dados){
            ?>

            <div class="avalia-livro" id="avaliacoes">
                <div class="div-avaliacao">
                    <div class="img-pessoa">
                        <img src="/public/static/imagens/amoregelato.jpg" style="border-radius: 100px; width: 70px; height: 70px;">
                    </div>
                    <div class="div-dados-avaliar">
                        <h4><?php echo $dados['nome'];?></h4>
                        <p><span>Nota:</span><?php echo $dados['nota'];?></p>
                        <p><span>Opinião:</span>Livro péssimo, desinteressante até onde eu li, não consegui terminar, dá muito sono.</p>
                    </div>
                </div>
            </div>

            <?php 
            }
            endif;
            ?>

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