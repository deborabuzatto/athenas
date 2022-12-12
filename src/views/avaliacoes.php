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
            <?php 
                if(isset($_POST['avaliacoes'])){
                    $codigo_livro = filter_var($_POST['codigo_livro'], FILTER_SANITIZE_STRING);
                    $livro = new Livro();
                    $busca = $livro->listarTodosDadosLivro($codigo_livro);
                    if(count($busca)>0){
                        foreach($busca as $dados){
            ?>
            
            <div class="avalia-div">
                <div class="avalia-livro-info">
                    <img src="../components/dinamic/<?php echo $dados['img_capa'];?>">
                    <div class="dados-livro-avalia">
                        <h4><?php echo $dados['titulo'];?></h4>
                        <p><span>Autor: </span><?php echo $dados['escritor'];?></p>
                        <p><span>Nacionalidade: </span><?php echo $dados['nacionalidade'];?></p>
                        <p><span>Editora: </span><?php echo $dados['editora'];?></p>
                        <p><span>Categoria: </span><?php echo $dados['categoria'];?></p>
                        <p><span>ISBN: </span><?php echo $dados['isbn'];?></p>
                        <p><span>Data de Publicação: </span><?php echo $dados['data_publicacao'];?></p>
                    </div>
                </div>

                <div class="avalia-livro-form">
                    <h3>Faça sua avaliação</h3>
                    <form action="../services/avaliarLivro.php" method="POST">
                        <input type="hidden" name="codigo_livro" value="<?php echo $dados['codigo'];?>">
                        <input placeholder="nota" type="number" name="nota" required>
                        <textarea placeholder="Digite sua opinião" name="dsc_comentario" required></textarea>
                        <div class="wrap"><button type="submit" name="btn-avalia" class="botao button">Avaliar</button></div>
                    </form>
                </div>
            </div>
            <?php }}} ?>
            
            <?php 
                if(isset($_POST['avaliacoes'])){
                    $codigo_livro = filter_var($_POST['codigo_livro'], FILTER_SANITIZE_STRING);
                    $livro = new Livro();
                    $busca = $livro->listarAvaliacoes($codigo_livro);
                    if(!empty($busca)){
                        echo '<h3 class="mt-5 pt-5 text-center">Outros usuários avaliaram:</h3>';
                        foreach($busca as $dados){
            ?>
            <div class="avaliacoes-livro">
                <div class="avaliacoes-livro-div">
                    <div class="avaliacoes-img"><img src="../components/dinamic/<?php echo $dados['img_perfil'];?>"></div>
                    <div class="dados-livro-avalia">
                        <h3><?php echo $dados['nome'];?></h3>
                        <p>Nota: <?php echo $dados['qtd_estrelas'];?></p>
                        <p>Comentário: <?php echo $dados['dsc_comentario'];?></p>
                    </div>
                </div>
            </div>
            <?php }}} ?>
        </div>

        <?php include '../components/footer.php'; ?>
        <?php include '../components/scriptsBody.php'; ?>
    </body>
</html>