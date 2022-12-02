<?php 
    //session_start();
    //$_SESSION['nome_aluno'];
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
		<nav class="navbar navbar-expand-lg ">
	        <div class="navbar-brand div-nav">
	            <img src="/public/static/imagens/athenas.png">
	        </div>
	        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#barraNavegacao" aria-expanded="false" >
	            <i class="fa-solid fa-bars-staggered"></i>
	        </button>
	        <div class="collapse navbar-collapse" id="barraNavegacao">
	            <ul class="navbar-nav mb-2 mb-lg-0">
	                <li class="nav-item dropdown">
	                  <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	                    Informações
	                  </a>
	                  <ul class="dropdown-menu">
	                    <li><a class="dropdown-item" href="infoSite.php">Sobre o site</a></li>
	                    <li><a class="dropdown-item" href="infoLivros.php">Sobre os livros</a></li>
	                    <li><a class="dropdown-item" href="infoInstuto.php">Sobre o instituto</a></li>
	                  </ul>
	                </li>
	                <li class="nav-item dropdown">
	                  <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	                    Minha Conta
	                  </a>
	                  <ul class="dropdown-menu">
	                    <li><a class="dropdown-item" href="editarPerfilAluno.php">Alterar Dados</a></li>
	                    <li><a class="dropdown-item" href="AlterarSenha.php">Alterar Senha</a></li>
	                    <li><a class="dropdown-item" href="../services/logout.php">Sair</a></li>
	                  </ul>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link" href="ajuda.php">Ajuda</a>
	                </li>
	            </ul>
	        </div>
	        <a href="relatorio.php" class="btn-login btn grow_box btn-nav-biblio" type="button">
	            <i class="fa fa-chess-rook"></i> Obter Relatório
	        </a>
	    </nav>
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
                <input type="text" name="" id="" placeholder="Procure seu livro aqui"><i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </div>
		<div class="centralizar-livros">
			<?php include 'livrosBiblio.php'; ?>
		</div>
		<?php include '../components/footer.php'; ?>
		<?php include '../components/scriptsBody.php'; ?>
	</body>
</html>