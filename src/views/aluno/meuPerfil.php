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
                <div>
                    <a href="home.php"><i class="fa fa-arrow-left-long"></i>Página Inicial</a>
                </div>
                <div class="nav-login-menu">
                    <img src="imagens/athenas.png">
                    <p>"A leitura desenvolve a mente. O pensamento a alma."</p>
                </div>
            </div>
            
            <div class="login">
                <div class="form-login-page">
                    <form action="/src/services/meuperfil.php" method="POST">
                        <div class="mb-3">
                            <label for="nomeContato" class="form-label">Nome Completo :</label>
                            <input type="text" class="form-control" id="nomeContato" disabled placeholder="Edição não permitida">
                        </div>

                        <div class="mb-3">
                            <label for="senhaLogin" class="form-label">Usuário:</label>
                            <input type="text" class="form-control" id="senhaLogin">
                        </div>

                        <div class="mb-3">
                            <label for="senhaLogin" class="form-label">Data de nascimento:</label>
                            <input type="date" class="form-control" id="senhaLogin" disabled placeholder="Edição não permitida"> 
                        </div>

                        <div class="mb-3">
                            <label for="senhaLogin" class="form-label">E-mail:</label>
                            <input type="email" class="form-control" id="senhaLogin">
                        </div>

                        <button type="submit" class="btn btn-primary"><a href="homeAluno.html">Atualizar</a></button>
                    </form>
                </div>
            </div>

            <?php 
                include '../components/footer.php'
            ?>
        </div>

        <!-- Script FontAwesome -->
        <script src="https://kit.fontawesome.com/a9ac96b7ba.js" crossorigin="anonymous"></script>

        <!-- Script Boostrap-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    </body>
</html>