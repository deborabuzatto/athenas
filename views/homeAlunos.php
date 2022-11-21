<?php 
    //session_start();
    //$aluno = $_SESSION['nome_aluno'];
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
			include '../components/header.php';
		?>
        <title>PÁGINA INICIAL | HOME</title>
    </head>
	<body>
        <?php
			include '../components/navbar.php';
		?>
		<div class="menu2">
            <div class="central-input">
                <input type="text" name="" id="" placeholder="Procure seu livro aqui"><i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <nav>
                <div class='centralizar-filtro'>
                    <div class='filtro'>
                        <div class="fast-filter">
                            <div class="text-center">
                                <input class="radio-input " type="radio" value="0" id="todos" name="type" checked>
                                <label class="radio-label " for="todos"><i class="fa-solid fa-square-caret-down"></i></label>
                                <p id="p-company" class="title">Todos</p>
                            </div>
            
                            <div class="text-center">
                                <input class="radio-input" type="radio" value="1" id="didatico" name="type">
                                <label class="radio-label " for="didatico"><i class="fa-solid fa-globe"></i></label>
                                <p id="p-person" class="title">Didáticos</p>
                            </div>
            
                            <div class="text-center">
                                <input class="radio-input "  type="radio" value="" id="classico" name="type">
                                <label class="radio-label " for="classico"><i class="fa-solid fa-landmark"></i></label>
                                <p id="p-licensed" class="title">Clássicos</p>
                            </div>
            
                            <div class="text-center">
                                <input class="radio-input" type="radio" value="1" id="americana" name="type">
                                <label class="radio-label " for="americana"><i class="fa-solid fa-flag-usa"></i></label>
                                <p id="p-notLicensed" class="title">Americana</p>
                            </div>
            
                            <div class="text-center">
                                <input class="radio-input" type="radio" value="1" id="romance" name="type">
                                <label class="radio-label " for="romance"><i class="fa-solid fa-heart"></i></label>
                                <p id="p-notLicensed" class="title">Romance</p>
                            </div>
            
                            <div class="text-center">
                                <input class="radio-input" type="radio" value="0" id="Policial" name="type">
                                <label class="radio-label " for="Policial"><i class="fa-solid fa-shield-halved"></i></label>
                                <p id="p-notLicensed" class="title">Policial</p>
                            </div>
            
                            <div class="text-center">
                                <input class="radio-input" type="radio" value="1" id="ficcao" name="type">
                                <label class="radio-label " for="ficcao"><i class="fa-solid fa-jedi"></i></label>
                                <p id="p-notLicensed" class="title">Ficção</p>
                            </div>
            
                            <div class="text-center">
                                <input class="radio-input" type="radio" value="1" id="ingles" name="type">
                                <label class="radio-label " for="ingles"><i class="fa-regular fa-paper-plane"></i></label>
                                <p id="p-notLicensed" class="title">Lin. Inglesa</p>
                            </div>
                        </div>
                    </div>   
                </div>
            </nav>
        </div>
		<div class="centralizar-livros">
            <?php
                include 'livros.php';
            ?>
		</div>
		<?php
			include '../components/footer.php';
		?>
    </div>
	    <?php
			include '../components/scriptsBody.php';
		?>
	</body>
</html>