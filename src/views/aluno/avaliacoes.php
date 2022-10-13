<?php
    include '../models/classLivro.php';
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            include '../components/header.php';
        ?>

        <title>VER AVALIAÇÕES</title>
    </head>
    <body>
        <div class="tela">
            
            <div class="nav-login">
                <div class="nav-link-item">
                    <a href="home.php"><i class="fa fa-arrow-left-long"></i>Página Inicial</a>
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
                if(isset($_POST['avaliacoes'])){
                    $codigo_livro = filter_var($_POST['codigo_livro'], FILTER_SANITIZE_STRING);
                
                    $livro = new Livro();
                    $busca = $livro->listarTodosDadosLivro($codigo_livro);
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
                        
                        <p><span>Autor:</span><?php echo $dados['autor'];?></p>
                        <p><span>Editora:</span><?php echo $dados['editora'];?></p>
                        <p><span>ISBN:</span><?php echo $dados['isbn'];?></p>
                        <p><span>Sinopse:</span><?php echo $dados['sinopse'];?></p>

                    </div>
                    
                </div>
                
                <div class="form-avalia">
                    <form method='post' action='/src/services/avaliarLivro.php'>
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
                endif; }
                ?>

                <div class="link-avaliacoes">
                    <a href="#avaliacoes">Ver outras Avaliações</a>
                </div>             
            </div>

            <?php 
                if(isset($_POST['avaliacoes'])){
                    $codigo_livro = filter_var($_POST['codigo_livro'], FILTER_SANITIZE_STRING);
                
                    $livro = new Livro();
                    $busca = $livro->listarAvaliacoes($codigo_livro);
                    if(count($busca)>0):
                        foreach($busca as $dados){
            ?>

            <div class="avalia-livro" id="avaliacoes">
                <div class="div-avaliacao">
                    <div class="img-pessoa">
                        <img src="/public/static/imagens/amoregelato.jpg" style="border-radius: 100px; width: 70px; height: 70px;">
                    </div>
                    <div class="div-dados-avaliar">
                        <h4><?php echo $dados['pessoa'];?></h4>
                        <p><span>Nota:</span><?php echo $dados['nota'];?></p>
                        <p><span>Opinião:</span>aaaa</p>
                    </div>
                </div>
            </div>

            <?php 
            }
            endif;}
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