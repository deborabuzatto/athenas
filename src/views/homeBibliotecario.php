<!DOCTYPE html>
<html>
    <head>
        <?php session_start(); include '../components/header.php'; ?>
        <title>PÁGINA INICIAL | HOME</title>
    </head>
	<body>
		<?php include '../components/navbarBiblio.php'; ?>
		<div class="menu2">
            <nav>
                <div class='centralizar-filtro'>
                    <div class='filtro'>
                        <div class="fast-filter">
                            <div class="text-center">
                                <a href="homeBibliotecario.php" class="radio-label red"><i class="fa-solid fa-square-caret-down"></i></a>
                                <p id="p-company" class="title">Livros</p>
                            </div>
                            <div class="text-center ">
                                <a href="cadastrarLivro.php" class="radio-label verde"><i class="fa-solid fa-landmark"></i></a>
                                <p id="p-licensed" class="title">Add Livro</p>
                            </div>
                            <div class="text-center">
                                <a href="alunosBibliotecario.php" class="radio-label amarelo"><i class="fa-solid fa-globe"></i></a>
                                <p id="p-person" class="title">Alunos</p>
                            </div>
                            <div class="text-center ">
                                <a href="cadastrarAluno.php" class="radio-label azul"><i class="fa-solid fa-landmark"></i></a>
                                <p id="p-licensed" class="title">Add Alunos</p>
                            </div>
                        </div>
                    </div>   
                </div>
            </nav>
			<form action="" method="POST">
			    <div class="central-input">
                	<input name="pesquisar" placeholder="Pesquise por um Livro">
					<button type="submit" name="btn-buscar"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>
        <?php if(isset($_SESSION['sucesso'])): ?>
            <div id="mensagem" style="float: right; position: fixed; bottom: 10px; right: 10px; background-color: green; padding: 10px; border-radius: 10px">
                <p><?php echo $_SESSION['sucesso']?></p>
            </div>
        <?php unset($_SESSION["sucesso"]); endif; ?>
        
		<div class="centralizar-livros">
			<?php include 'livrosBiblio.php'; ?>
		</div>
		<?php include '../components/footer.php'; ?>
		<?php include '../components/scriptsBody.php'; ?>
        <script>
            setTimeout(function() {
                if(document.getElementById('mensagem')){
                    document.getElementById('mensagem').style.display = 'none'
                }
            }, 3000)
        </script>
	</body>
</html>