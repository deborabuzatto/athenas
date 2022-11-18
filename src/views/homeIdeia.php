<!DOCTYPE html>
<html>
<head>
        <!-- Padrão -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Link font -->
		<!-- Poppins -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link rel="shortcut icon" href="/favicon/favicon.ico"/>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">

		<!-- Radio Canada -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;700&family=Radio+Canada:wght@300&family=Roboto+Mono:wght@200&display=swap" rel="stylesheet">

		<!-- Nunito -->
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet"> 

		<!-- Boostrap -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

		<!-- Css externo -->
		<link rel="stylesheet" href="/public/static/css/style.css">
		<link rel="stylesheet" href="/public/static/css/estilo.css">

        <title>PÁGINA INICIAL | HOME</title>
    </head>
	<body>
		<nav class="navbar navbar-expand-lg ">
	        <div class="navbar-brand div-nav">
	            <img src="/public/static/imagens/logo.png">
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
	        <a href="locacao.php" class="btn-login btn grow_box" type="button">
	            <i class="fa fa-chess-rook"></i> Locação
	        </a>
	    </nav>
		<div class="menu2">
            
            <nav>
                <div class='centralizar-filtro'>
                    <div class='filtro'>
                        <div class="fast-filter">
                            <div class="text-center">
                                <input class="radio-input " type="radio" value="0" id="todos" name="type" checked>
                                <label class="radio-label " for="todos"><i class="fa-solid fa-square-caret-down"></i></label>
                                <p id="p-company" class="title">Livros</p>
                            </div>
            
                            <div class="text-center">
                                <input class="radio-input" type="radio" value="1" id="didatico" name="type">
                                <label class="radio-label " for="didatico"><i class="fa-solid fa-globe"></i></label>
                                <p id="p-person" class="title">Alunos</p>
                            </div>
            
                            <div class="text-center">
                                <input class="radio-input "  type="radio" value="" id="classico" name="type">
                                <label class="radio-label " for="classico"><i class="fa-solid fa-landmark"></i></label>
                                <p id="p-licensed" class="title">Gráficos</p>
                            </div>
            
                            <div class="text-center">
                                <input class="radio-input" type="radio" value="1" id="americana" name="type">
                                <label class="radio-label " for="americana"><i class="fa-solid fa-flag-usa"></i></label>
                                <p id="p-notLicensed" class="title">Locações</p>
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
			
		<?php
			include 'livrosBiblio.php';
		?>
		</div>
		<?php
			include '../components/footer.php';
		?>
    </div>

	<script src="https://kit.fontawesome.com/a9ac96b7ba.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
	</body>
</html>