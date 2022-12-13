<?php 
    session_start();
    if(isset($_SESSION['aluno'])){
        $aluno = $_SESSION['aluno'];
    }else{ header("Location: ../views/login.php"); }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../components/header.php'; ?>
        <title>RELATÓRIO ATHENAS</title>
    </head>
    <body>
        <?php include '../components/navbar.php'; ?>

        <div class="div-info"> 
            <p>O site Athenas surgiu com o propósito de facilitar o gerenciamento da biblioteca do Instituto Ponte e atrair mais leitores. Aqui o aluno poderá consultar a disponibilidade de um livro, favoritar os seus preferidos e avaliar os livros lidos. O bibliotecário poderá cadastrar livros e alunos, e ter acesso a gráficos e informações pertinentes para o gerenciamento da biblioteca.</p>
            <img src="/public/static/imagens/telaSistema.jpg">
        </div>

        <div class="div-info-2">
            <img src="/public/static/imagens/infoLivros.jpg">
            <p>A biblioteca do Instituto Ponte conta com as mais variadas obras, sendo todas elas adquiridas por meio de doações, para dar oportunidade de você, leitor, desfrutar de cultura, informação e entretenimento. Na coletânea há livros para todos os públicos; independentemente do seu gosto literário, aqui há um livro para você. 
            </p>
        </div>
    </div>

        <?php include '../components/footer.php'; ?>
        <?php include '../components/scriptsBody.php'; ?>
    </body>
</html>