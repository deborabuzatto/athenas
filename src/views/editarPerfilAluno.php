<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Padrão -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Link font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="shortcut icon" href="/favicon/favicon.ico"/>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;700&family=Radio+Canada:wght@300&family=Roboto+Mono:wght@200&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Piazzolla:opsz,wght@8..30,200;8..30,300&display=swap" rel="stylesheet">

        <!-- Css externo -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/estilos.css">
        

        <!--<script src="js/api.js"></script>-->

        <title>Teste 1</title>
    </head>
    <body>
        <div class="tela">
            <div class="nav-login">
                <div>
                    <a href="homeAluno.html"><i class="fa fa-arrow-left-long"></i>Página Inicial</a>
                </div>
                <div class="nav-login-menu">
                    <img src="imagens/athenas.png">
                    <p>"A leitura desenvolve a mente. O pensamento a alma."</p>
                </div>
            </div>
            
            <div class="login">
                <div class="form-login-page">
                    <form>
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