<!DOCTYPE html>
<html>
    <head>
        <?php include '../components/header.php'; ?>
        <title>PÁGINA INICIAL | HOME</title>
    </head>
	<body>
        <?php include '../components/navbar.php'; ?>
		<div class="menu2">
            <div class="central-input">
                <form action="" method="POST">
                    <input type="text" name="pesquisar" placeholder="Procure seu livro aqui">
                    <button name="btn-buscar" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <nav>
                <div class='centralizar-filtro'>
                    <div class='filtro'>
                        <div class="fast-filter">
                            <div class="text-center">
                                <a href="homeAlunos.php" class="radio-label amarelo"><i class="fa-solid fa-square-caret-down"></i></a>
                                <p id="p-company" class="title">Todos</p>
                            </div>

                            <div class="text-center">
                                <form action="" method="POST">
                                    <input class="radio-input" type="radio" value="ranking" name="type">
                                    <button class="radio-label azul" name="btn-categoria"><i class="fa-solid fa-square-caret-down"></i></button>
                                    <p id="p-company" class="title">Ranking</p>
                                </form>
                            </div>
            
                            <div class="text-center">
                                <input class="radio-input" type="radio" value="didatico" name="type">
                                <button class="radio-label red"><i class="fa-solid fa-globe"></i></button>
                                <p id="p-person" class="title">Didáticos</p>
                            </div>
            
                            <div class="text-center">
                                <input class="radio-input" type="radio" value="classico" name="type">
                                <button class="radio-label azul"><i class="fa-solid fa-landmark"></i></button>
                                <p id="p-licensed" class="title">Clássicos</p>
                            </div>
            
                            <div class="text-center">
                                <input class="radio-input" type="radio" value="americana" name="type">
                                <button class="radio-label verde"><i class="fa-solid fa-flag-usa"></i></button>
                                <p id="p-notLicensed" class="title">Americana</p>
                            </div>
            
                            <div class="text-center">
                                <input class="radio-input" type="radio" value="romance" name="type">
                                <button class="radio-label rosa"><i class="fa-solid fa-heart"></i></button>
                                <p id="p-notLicensed" class="title">Romance</p>
                            </div>
            
                            <div class="text-center">
                                <input class="radio-input" type="radio" value="Policial" name="type">
                                <button class="radio-label amarelo" ><i class="fa-solid fa-shield-halved"></i></button>
                                <p id="p-notLicensed" class="title">Policial</p>
                            </div>
            
                            <div class="text-center">
                                <input class="radio-input" type="radio" value="ficcao" name="type">
                                <button class="radio-label azul"><i class="fa-solid fa-jedi"></i></button>
                                <p id="p-notLicensed" class="title">Ficção</p>
                            </div>
            
                            <div class="text-center">
                                <input class="radio-input" type="radio" value="ingles" name="type">
                                <button class="radio-label verde"><i class="fa-regular fa-paper-plane"></i></button>
                                <p id="p-notLicensed" class="title">Lin. Inglesa</p>
                            </div>
                        </div>
                    </div>   
                </div>
            </nav>
        </div>
		<div class="centralizar-livros">
            <?php include 'livros.php';?>
		</div>
		<?php include '../components/footer.php'; ?>
	    <?php include '../components/scriptsBody.php'; ?>
	</body>
</html>