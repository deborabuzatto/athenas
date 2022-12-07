<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <?php include '../components/header.php'; ?>
        <title>PÁGINA INICIAL | HOME</title>
    </head>
	<body>
		<?php include '../components/navbarBiblio.php' ?>
		
		<div class="menu2">
            <nav>
                <div class='centralizar-filtro'>
                    <div class='filtro'>
                        <div class="fast-filter">
                            <div class="text-center">
                                <a href="homeBibliotecario.php" class="radio-label  red"><i class="fa-solid fa-square-caret-down"></i></a>
                                <p id="p-company" class="title">Livros</p>
                            </div>
            
                            <div class="text-center">
                                <a href="alunosBibliotecario.php" class="radio-label amarelo"><i class="fa-solid fa-globe"></i></a>
                                <p id="p-person" class="title">Alunos</p>
                            </div>
            
                            <div class="text-center ">
                                <a href="graficos.php" class="radio-label azul"><i class="fa-solid fa-landmark"></i></a>
                                <p id="p-licensed" class="title">Gráficos</p>
                            </div>
                        </div>
                    </div>   
                </div>
            </nav>
			<div class="central-input">
				<form action="" method="POST">
                	<input type="text" name="pesquisar" id="" placeholder="Pesquise por um aluno">
					<button type="submit" name="btn-buscar"><i class="fa-solid fa-magnifying-glass"></i></button>
				</form>
			</div>
        </div>
		<div class="centralizar-livros">
			<?php include 'alunosBiblio.php'; ?>
		</div>
		<?php include '../components/footer.php'; ?>
		<?php include '../components/scriptsBody.php'; ?>
    </body>
</html>