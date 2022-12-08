<?php 
    include '../models/classAluno.php';
    session_start();
    if(isset($_SESSION['aluno'])){
        $aluno = $_SESSION['aluno'];
    }else{ header("Location: ../views/login.php"); }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../components/header.php'; ?>
        <title>MEUS PERFIL | DADOS</title>
    </head>
    <body>
        <div class="nav-login">
            <div class="nav-link-item"><a href="homeAlunos.php"><i class="fa fa-arrow-left-long"></i>Página Inicial</a></div>
            <div class="page-info-name"><p>Você está na página:</p><a href="#">Meu perfil</a></div>
            <div class="nav-login-menu">
                <img src="/public/static/imagens/athenas.png">
                <p>"A leitura desenvolve a mente. O pensamento a alma."</p>
            </div>
        </div>
        <?php
            $alunos = new Aluno();
            $imprimir = $alunos->find($aluno);
            if($imprimir):   
        ?>
        <div class="cadastrar-livro">
            <form enctype="multipart/form-data" method="POST" action="../services/meuperfil.php">
                <input type='hidden' class="form-control" name="codigo_pessoa" value="<?php echo $imprimir['codigo_pessoa']?>">
                <div class="input-nomes">
                    <label for="nomeContato" class="form-label">Nome completo:</label>
                    <input class="form-control" name="nome"  disabled value="<?php echo $imprimir['nome']?>">
                
                    <label for="senhaLogin" class="form-label">Data de nascimento:</label>
                    <input type="date" class="form-control" name="data_nasc" disabled value="<?php echo $imprimir['data_nasc']?>" > 

                    <label for="nomeContato" class="form-label">E-mail:</label>
                    <input class="form-control" name="email" value="<?php echo $imprimir['email']?>">
                </div>
                
                <div class="input-selecionar">
                    <label for="nomeContato" class="form-label">Usuário:</label>
                    <input class="form-control" name="username" value="<?php echo $imprimir['username']?>">
                </div>

                <div class="input-nomes">
                    <label for="file" class="form-label">Importar foto:</label>
                    <input type="file" class="form-control" id="file" name="file" value="<?php echo $imprimir['img_perfil']?>" placeholder="Imagem da capa">
                </div>

                <div class="btn-conclui-cadastro">
                    <button class="btn btn-pesquisa-bibliotecario" name="btn-editar">Concluir Atualizações</button>
                </div> 
            </form>
        </div>
        <?php endif; ?>
        <?php include '../components/footer.php'; ?>
        <?php include '../components/scriptsBody.php'; ?>
    </body>
</html>