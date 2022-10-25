<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php
            include '../components/header.php';
        ?> 
    <title>TESTE DE LAYOUT</title>
</head>
<body>
    <nav>
        <div class="nav-login">
            <div class="nav-login-menu">
                <img src="/public/static/imagens/logolaranja.png">
                <p>"A leitura desenvolve a mente. O pensamento a alma."</p>
            </div>
        </div>
    </nav>

    <section class="tela">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Livros</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Alunos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Locação</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="bars-info">
                    <ul class="nav1 nav-tabs sub-nav" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="data-tab" data-bs-toggle="tab" data-bs-target="#data" type="button" role="tab" aria-controls="data" aria-selected="true">Gerenciar</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="dias-tab" data-bs-toggle="tab" data-bs-target="#dias" type="button" role="tab" aria-controls="dias" aria-selected="false">Dados</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="data" role="tabpanel" aria-labelledby="data-tab">
                            <?php
                                include '../views/graficos.php';
                            ?>
                        </div>
                        <div class="tab-pane fade" id="dias" role="tabpanel" aria-labelledby="dias-tab">
                            <?php
                                include '../views/teste.php';
                            ?>
                        </div>
                    </div>
                </div>
            <div>



            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <?php
                    include '../views/livrosAluno.php';
                ?>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <?php
                    include '../views/teste.php';
                ?>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>