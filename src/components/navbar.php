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
				Minha Conta
				</a>
				<ul class="dropdown-menu">
				<li><a class="dropdown-item" href="meuPerfil.php">Alterar Dados</a></li>
				<li><a class="dropdown-item" href="AlterarSenha.php">Alterar Senha</a></li>
				<li><a class="dropdown-item" href="login.php">Sair</a></li>
				</ul>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="informacoes.php">Informacoes</a>
			</li>
		</ul>
	</div>
	<a href="historicoAlunoPage.php" class="btn-login btn grow_box" type="button">
		<i class="fa fa-chess-rook"></i> Meu Histórico
	</a>
</nav>