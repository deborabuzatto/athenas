<?php
    include '../models/classLivro.php';
    include '../models/classAluno.php';
    session_start();
    if (isset($_SESSION['resultado'])) {
        session_destroy();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../components/header.php'; ?>
        <title>LOCAÇÃO | REGISTROS</title>
    </head>
    <body>
        <div class="nav-login">
            <div class="nav-link-item"><a href="/index.php"><i class="fa fa-arrow-left-long"></i>Página Inicial</a></div>
            <div class="page-info-name"><p>Você está na página:</p><a href="#">LOCAÇÕES</a></div>
            <div class="nav-login-menu">
                <img src="/public/static/imagens/athenas.png">
                <p>"A leitura desenvolve a mente. O pensamento a alma."</p>
            </div>
        </div>
        
        <div class="centralizar-livro">
            <?php 
            if(isset($_POST['btn-locacao'])){
                $codigo_livro = filter_var($_POST['codigo_livro'], FILTER_SANITIZE_STRING);
                $pesquisar = filter_var($_POST['pesquisar'], FILTER_SANITIZE_STRING);
                $palavra = '%' . $pesquisar. '%';
                $aluno = new Aluno();
                $busca = $aluno->busca($palavra);

                $livro = new Livro();
                $buscar = $livro->listarTodosDadosLivro($codigo_livro);

                if(count($busca)>0){
                    foreach($busca as $dados){
                        if(count($buscar)>0){
                            foreach($buscar as $info){
            ?>
            <div class="titulo"><h2>Você selecionou o livro:</h2></div>

            <div class="div-livro-locacao">
                <div><img class="img" src="../components/dinamic/<?php echo $info['img_capa'];?>"></div>
                <div class="table-conteudo">
                    <h4><?php echo $info['titulo'];?></h4>
                    <p class="sinopse"><?php echo $info['sinopse']; echo' . . . ';?></p>
                </div>
                <div class="status">
                    <div>
                        <?php
                            $livro = new Livro();
                            $codigo_livro = $info['codigo']; 
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
                        <span><?php echo $info['categoria'];?></span>
                    </div>
                    <div>
                        <i class="fa fa-ranking-star"></i>
                        <span>
                            <?php
                            if(empty($info['nota'])){
                                echo 'não avaliado';
                            }else{
                                echo $info['nota'];
                            }
                            ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="titulo"><h2>Você selecionou o Aluno:</h2></div>
            <div class="div-livro-locacao livro">
                <div class="img-pessoa1"><img src="../components/dinamic/<?php echo $dados['img_perfil'];?>"></div>
                <div class="table-conteudo">
                    <h4><?php echo $dados['nome'];?></h4>
                    <p><span>Username: </span><?php echo $dados['username'];?></p>
                    <p><span>Data de nascimento: </span><?php echo $dados['data_nasc'];?></p>
                    <p><span>E-mail: </span><?php echo $dados['email'];?></p>
                </div>
            </div>

                    
                
            <div class="form-loc">
                <form action="../services/locacao.php" method="POST">
                    <input type="hidden" name="codigo_pessoa" value="<?php echo $dados['codigo_pessoa'];?>">
                    <input type="hidden" name="codigo_livro" value="<?php echo $info['codigo'];?>">
                    <button name="btn-locar" class="btn btn-pesquisa-bibliotecario">Locar/Devolver</button>
                </form>
            </div>

            <?php }}}}} ?>

            <?php if(isset($_SESSION['sucesso'])): ?>
                <div  class="text-center div-sucesso">
                    <p> 
                        <?php 
                            $resultado = $_SESSION['sucesso'];
                            echo 'O livro foi ' .$resultado. ' com sucesso'; 
                        ?> 
                        <a href="homeBibliotecario.php">Voltar ao inicio</a>
                    </p>
                </div>
            <?php unset($_SESSION["sucesso"]); endif; ?>
            
        </div>

        

        <?php include '../components/footer.php'; ?>
        <?php include '../components/scriptsBody.php'; ?>
    </body>
</html>