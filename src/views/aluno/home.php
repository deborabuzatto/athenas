<?php 
    ///session_start();
    //$_SESSION['nome_aluno'];
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
                <div class="page-item-topo">
                    <p>Você está vendo a:</p><a href="#" class="gradiente">Página Inicial</a>

                </div>

                <div class="page-info-name">
                    <i class="fa fa-gear"></i>
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </div>

                <div class="nav-login-menu">
                    <img src="/public/static/imagens/athenas.png">
                    <p>"A leitura desenvolve a mente. O pensamento a alma."</p>
                </div>
            </div>
            
            <div class="home-div-conteudo">
                <div class="home-div">
                    
                    <div class="home-opcoes">
                        <div><a href="livrosAluno.php"><i class="fa fa-book-open"></i></a></div>
                        <div><a href="rankingPage.php"><i class="fa fa-ranking-star"></i></a></div>
                        <div><a href="historicoAlunoPage.php"><i class="fa fa-address-book"></i></a></div>
                        <div><a href="meuperfil.html"><i class="fa fa-user"></i></a></div>
                        <p class="sair"><a href="logout.php">Sair</a></p>
                    </div>
                    <div class="home-pessoa">
                        <div><img src="/public/static/imagens/amoregelato.jpg"></div>
                        <h4 >Bem vinda, Débora Buzatto</h4>
                        <p class="w-75 m-auto mt-5 pt-5">O instituto agredece sua matrícula, esperamos que esse site informativo, seja exatamente o que você procura para passar seu tempo, essa ferramenta foi excluxivamente pensada em você, faça bom uso!
                        </p>
                    </div>
                </div>
            </div>

            <?php
                include '../components/footer.php';
            ?>
        </div>

        <!-- Script FontAwesome -->
        <script src="https://kit.fontawesome.com/a9ac96b7ba.js" crossorigin="anonymous"></script>

        <!-- Script Boostrap-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    </body>
</html>