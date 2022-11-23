<?php
    include '../models/classLivro.php';
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../components/header.php'; ?>
        <title>AVALIAÇÕES | COMENTÁRIOS</title>
    </head>
    <body>
        <div class="tela">
            <div class="nav-login">
                <div class="nav-link-item"><a href="/index.php"><i class="fa fa-arrow-left-long"></i>Página Inicial</a></div>
                <div class="page-info-name"><p>Você está na página:</p><a href="#">AVALIAÇÕES</a></div>
                <div class="nav-login-menu">
                    <img src="/public/static/imagens/logo.png">
                    <p>"A leitura desenvolve a mente. O pensamento a alma."</p>
                </div>
            </div>
            
            <div class="avalia-div">
                <div class="avalia-livro-info">
                <?php 
                    if(isset($_POST['avaliacoes'])){
                        $codigo_livro = filter_var($_POST['codigo_livro'], FILTER_SANITIZE_STRING);
                        $livro = new Livro();
                        $busca = $livro->listarTodosDadosLivro($codigo_livro);
                        if(count($busca)>0):
                            foreach($busca as $dados){
                ?>
                    <img src="../components/dinamic/<?php echo $dados['img_capa'];?>">
                    <div class="dados-livro-avalia">
                        <h4><?php echo $dados['titulo'];?></h4>
                        <p><span>Autor:</span><?php echo $dados['autor'];?></p>
                        <p><span>Editora:</span><?php echo $dados['editora'];?></p>
                        <p><span>ISBN:</span><?php echo $dados['isbn'];?></p>
                    </div>
                <?php 
                    }
                    endif; }
                ?>
                </div>

                <div class="avalia-livro-form">
                    <h3>Faça sua avaliação</h3>
                    <form>
                        <input placeholder="nota" type="number" required>
                        <textarea placeholder="Digite sua opinião" required></textarea>
                        <div class="wrap"><button name="btn-login" class="botao button">Avaliar</button></div>
                    </form>
                </div>
            </div>

            <div class="avaliacoes-livro">
                <?php 
                    if(isset($_POST['avaliacoes'])){
                        $codigo_livro = filter_var($_POST['codigo_livro'], FILTER_SANITIZE_STRING);
                    
                        $livro = new Livro();
                        $busca = $livro->listarAvaliacoes($codigo_livro);
                        if(count($busca)>0):
                            foreach($busca as $dados){
                ?>
                <h1>Outros usuários avaliaram:</h1>
                <div class="avaliacoes-livro-div">
                    <div class="avaliacoes-img"><img src="/public/static/imagens/livroHistoria.jpg"></div>
                    <div class="dados-livro-avalia">
                        <h3>Título</h3>
                        <p>5.00</p>
                        <p>Carla Meneguine</p>
                    </div>
                </div>
                <?php }endif;} ?>
            </div>
        </div>

        <?php include '../components/footer.php'; ?>

        <!-- Script FontAwesome -->
        <script src="https://kit.fontawesome.com/a9ac96b7ba.js" crossorigin="anonymous"></script>

        <!-- Script Boostrap-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    </body>
</html>