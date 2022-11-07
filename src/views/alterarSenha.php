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
                    <div><img  class="logo" src="/public/static/imagens/logo.png"></div>
                    <form method="POST" action="../services/login.php">
                        <?php if(isset($_SESSION['nao_autenticado'])): ?>
                        <div><p class="text-center text-danger">Dados incorretos. Tente novamente!</p></div>
                        <?php unset($_SESSION["nao_autenticado"]); endif; ?>
                        
                        <div><input type="email" placeholder="SENHA ATUAL" name="email" required></div>
                        <div><input type="password" placeholder="NOVA SENHA" name="senha" required></div>
                        <div><input type="password" placeholder="CONFIRMAR NOVA SENHA" name="senha" required></div>
                        <div class="wrap"><button name="btn-alterar" class="btn-login button">ALTERAR</button></div>
                    </form>
                </div>
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