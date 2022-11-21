<?php
    include '../models/classLivro.php';
    //session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../components/header.php'; ?>
        <title>LOCAÇÃO | REGISTROS</title>
    </head>
    <body>
        <div class="tela">
            <div class="nav-login">
                <div class="nav-link-item"><a href="/index.php"><i class="fa fa-arrow-left-long"></i>Página Inicial</a></div>
                <div class="page-info-name"><p>Você está na página:</p><a href="#">LOCAÇÕES</a></div>
                <div class="nav-login-menu">
                    <img src="/public/static/imagens/athenas.png">
                    <p>"A leitura desenvolve a mente. O pensamento a alma."</p>
                </div>
            </div>
            
            <?php 
                if(isset($_POST['locacoes'])){
                    $codigo_livro = filter_var($_POST['codigo_livro'], FILTER_SANITIZE_STRING);
                    $livro = new Livro();
                    $busca = $livro->listarTodosDadosLivro($codigo_livro);
                    if(count($busca)>0):
                        foreach($busca as $dados){
            ?>
            <div class="centralizar-livro">
                <div class="titulo"><h2>Você selecionou o livro:</h2></div>
                <div class="div-livro-locacao livro"  data-bs-toggle="modal" data-bs-target="#informacoes<?php echo $dados['codigo_livro'];?>">
                    <div><img src="../components/dinamic/<?php echo $dados['img_capa'];?>"></div>
                    <div class="table-conteudo">
                        <h4><?php echo $dados['titulo'];?></h4>
                        <p class="sinopse"><?php echo $dados['sinopse']; echo' . . . ';?></p>
                    </div>
                    <div class="status">
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
            </div>
            <?php 
                }
                endif; }
            ?>
        </div>

        <?php include '../components/footer.php'; ?>
        <?php include '../components/scriptsBody.php'; ?>
    </body>
</html>