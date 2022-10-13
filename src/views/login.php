<?php 
	session_start();
	if (isset($_SESSION['aluno']) || isset($_SESSION['bibliotecario'])) {
		session_destroy();
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            include '../components/header.php';
        ?>
        <title>Teste 1</title>
    </head>
    <body>
        <div class="tela">
            <div class="nav-login">
                <div class="nav-link-item">
                    <a href="/index.php"><i class="fa fa-arrow-left-long"></i>Página Inicial</a>
                </div>

                <div class="page-info-name">
                    <p>Você está na página:</p><a href="#">login</a>
                </div>

                <div class="nav-login-menu">
                    <img src="/public/static/imagens/logolaranja.png">
                    <p>"A leitura desenvolve a mente. O pensamento a alma."</p>
                </div>
            </div>
            
            <div class="login">
                <div class="img-login">
                    <img src="/public/static/imagens/Login-cuate.png">
                </div>
                <div class="form-login-page">
                    <form method="POST" action="../services/login.php">
                        <?php
                            if(isset($_SESSION['nao_autenticado'])):
                        ?>
                        <div>
                            <p class="text-center text-warning">Dados incorretos. Tente novamente!</p>
                        </div>
                        <?php
                            unset($_SESSION["nao_autenticado"]);
                            endif;
                        ?>
                        <div class="mb-3">
                            <label for="nomeContato" class="form-label">Usuário:</label>
                            <input type="text" class="form-control" id="nomeContato" aria-describedby="emailHelp" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="senhaLogin" class="form-label">Senha:</label>
                            <input type="password" class="form-control" id="senhaLogin" name="senha" required>
                        </div>

                        <div class="mb-3">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="bibliotecario" >
                            <label class="form-check-label" for="exampleCheck1">Acessar como bibliotecário</label>
                        </div>

                        <button type="submit" class="btn btn-primary" name="btn-login">ACESSAR</button>
                    </form>
                </div>
            </div>

            <div class="page-info-name footer-login fixed-bottom">
                <p> &copy; Desenvolvido por Athenas produção; </p>
            </div>
                
            
        </div>

        <!-- Script FontAwesome -->
        <script src="https://kit.fontawesome.com/a9ac96b7ba.js" crossorigin="anonymous"></script>

        <!-- Script Boostrap-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    </body>
</html>