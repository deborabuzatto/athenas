<!DOCTYPE html>
<html>
    <head>
        <?php include '../components/header.php'; ?>
        <title>PÁGINA INICIAL | HOME</title>
    </head>
	<body>
        <?php include '../components/navbar.php'; ?>
		<div class="menu2">
            <form action="" method="POST">
                <div class="central-input">
                    <input type="text" name="pesquisar" placeholder="Procure seu livro aqui">
                    <button class="" name="btn-buscar" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
            <nav>
                <div class='centralizar-filtro'>
                    <div class='filtro'>
                        <div class="fast-filter">
                            <div class="text-center">
                                <a href="homeAlunos.php" class="radio-label rosa"><i class="fa-solid fa-square-caret-down"></i></a>
                                <p id="p-company" class="title">Todos</p>
                            </div>

                            <div class="text-center">
                                <form action="" method="POST">
                                    <input class="radio-input" type="text" value="ranking" name="type">
                                    <button class="radio-label azul" name="btn-ranking"><i class="fa fa-ranking-star"></i></button>
                                    <p id="p-company" class="title">Ranking</p>
                                </form>
                            </div>
            
                            <div class="text-center">
                                <form action="" method="POST">
                                    <input class="radio-input" type="text" value="Didaticos" name="pesquisar">
                                    <button class="radio-label amarelo" name="btn-buscar" type="submit"><i class="fa-solid fa-globe"></i></button>
                                    <p id="p-person" class="title">Didáticos</p>
                                </form>
                            </div>
            
                            <div class="text-center">
                                <form action="" method="POST">
                                    <input class="radio-input" type="text" value="Clássicos" name="pesquisar">
                                    <button class="radio-label verde" name="btn-buscar" type="submit"><i class="fa-solid fa-landmark"></i></button>
                                    <p id="p-licensed" class="title">Clássicos</p>
                                </form>
                            </div>
            
                            <div class="text-center">
                                <form action="" method="POST">
                                    <input class="radio-input" type = "text" value="Estrangeiros" name="pesquisar">
                                    <button class="radio-label rosa" name="btn-buscar" type="submit"><i class="fa-regular fa-paper-plane"></i></button>
                                    <p id="p-notLicensed" class="title">Estrangeiros</p>
                                </form>
                            </div>
            
                            <div class="text-center">
                                <form action="" method="POST">
                                    <input class="radio-input" type = "text" value="Infantil" name="pesquisar">
                                    <button class="radio-label azul" name="btn-buscar" type="submit"><i class="fa fa-puzzle-piece"></i></button>
                                    <p id="p-notLicensed" class="title">Infantil</p>
                                </form>
                            </div>
            
                            <div class="text-center">
                                <form action="" method="POST">
                                    <input class="radio-input" type = "text" value="ficcao" name="pesquisar">
                                    <button class="radio-label verde" name="btn-buscar" type="submit"><i class="fa-solid fa-jedi"></i></button>
                                    <p id="p-notLicensed" class="title">Ficção</p>
                                </form>
                            </div>
            
                            <div class="text-center">
                                <form action="" method="POST">
                                    <input class="radio-input" type="text" value="ingles" name="pesquisar">
                                    <button class="radio-label amarelo" name="btn-buscar" type="submit"><i class="fa-solid fa-flag-usa"></i></button>
                                    <p id="p-notLicensed" class="title">Lin. Inglesa</p>
                                </form>
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