<?php 
    session_start();
    $aluno = $_SESSION['nome_aluno'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../components/header.php'; ?>
        <title>ALTERAR | SENHA</title>
    </head>
    <body>
        <div class="tela">
            <div class="nav-login">
                <div class="nav-link-item"><a href="/index.php"><i class="fa fa-arrow-left-long"></i>Página Inicial</a></div>
                <div class="page-info-name"><p>Você está na página:</p><a href="#">ALTERAR MINHA SENHA</a></div>
            </div>
            
            <div class="login-div">
                <div class="form-login">
                    <div><img  class="logo" src="/public/static/imagens/athenas.png"></div>
                    <form method="POST" action="../services/alterarSenha.php">
                        <?php if(isset($_SESSION['nao_autenticado'])): ?>
                        <div><p class="text-center text-danger">Senha atual incorreta. Tente novamente!</p></div>
                        <?php unset($_SESSION["nao_autenticado"]); endif; ?>
                        
                        <div><input type="text" placeholder="Senha Atual" name="senha_atual" id="senha_atual" required></div>
                        <div><input type="password" placeholder="Nova Senha" name="nova_senha" id="nova_senha" required></div>
                        <div><input type="password" placeholder="Confirmar Nova Senha" name="confirma_senha" id="confirma_senha" required></div>
                        <div><input type="hidden" name="codigo_pessoa" value="<?php echo $aluno ?>" required></div>
                        <div class="wrap"><button name="btn-alterar" class="btn-login button">ALTERAR</button></div>
                    </form>
                </div>
            </div>
        </div>

        <?php include '../components/footer.php'; ?>
        <?php include '../components/scriptsBody.php'; ?>                   
    </body>
</html>