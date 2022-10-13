<?php
    include '/src/models/classLivro.php';
    session_start();
    $aluno = $_SESSION['nome_aluno'];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            include '/src/components/header.php';
        ?>
        <title>Teste 1</title>
    </head>
    <body>
        <div class="tela">
            <div class="nav-login">
                <div class="nav-link-item">
                    <a href="home.php"><i class="fa fa-arrow-left-long"></i>Página Inicial</a>
                </div>

                <div class="page-info-name">
                    <p>Você está vendo:</p><a href="#">Seu histórico</a>
                </div>

                <div class="nav-login-menu">
                    <img src="/public/static/imagens/logolaranja.png">
                    <p>"A leitura desenvolve a mente. O pensamento a alma."</p>
                </div>
            </div>
            
            

            <div class="conteudo-livro-page">
                <?php
                    $historico = new Livro();
                    $busca = $historico->listarHistorico($aluno);
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
                            <p class="categoria"><?php echo $dados['dsc_categoria'];?></p>

                            <p class="sinopse" ><?php echo $dados['sinopse'];?></p>
                        </div>
                    </div>                    
                </div>
                
                <?php
                }
                }
                else{
                ?>
                    <div>
                        <div class="erro-historico">
                            <h2>você ainda leu nenhuma obra :(</h2>
                            <p>Que tal começar agora? <a href="livrosAlunos.php">Procurar Obras</a></p>
                        </div>
        
                    </div>
                <?php 
                }
                ?>
            </div>
            
            <?php
                include '/src/components/footer.php'
            ?>
            
        </div>

        <!-- Script FontAwesome -->
        <script src="https://kit.fontawesome.com/a9ac96b7ba.js" crossorigin="anonymous"></script>

        <!-- Script Boostrap-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    </body>
</html>