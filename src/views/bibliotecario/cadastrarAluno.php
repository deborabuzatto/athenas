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
                <div class="nav-link-item">
                    <a href="homeBibliotecario.php"><i class="fa fa-arrow-left-long"></i>Página Inicial</a>
                </div>

                <div class="page-info-name">
                    <p>Você está na página:</p><a href="#">Cadastro de alunos</a>
                </div>

                <div class="nav-login-menu">
                    <img src="/public/static/imagens/logolaranja.png">
                    <p>"A leitura desenvolve a mente. O pensamento a alma."</p>
                </div>
            </div>
            
            <div class="cadastrar-livro">
                <form method="post" action="../services/cadastrarAluno.php">
                    <div class="input-nomes">
                        <label for="nomeContato" class="form-label">Nome completo:</label>
                        <input type="text" class="form-control" id="nomeContato" name="nome">

                        <label for="nomeContato" class="form-label">Nome de usuário:</label>
                        <input type="text" class="form-control" id="nomeContato" name="username">
                    
                        <label for="senhaLogin" class="form-label">Data de nascimento:</label>
                        <input type="date" class="form-control" id="senhaLogin" name="data_nasc"> 

                        <label for="senhaLogin" class="form-label">E-mail:</label>
                        <input type="text" class="form-control" id="senhaLogin" name="email">
                        
                        <label for="nomeContato" class="form-label">Senha padrão:</label>
                        <input type="text" class="form-control mb-0" id="nomeContato" name="senha" placeholder="biblioteca123" disabled>

                        <p class="text-danger mb-5">Apenas o usuário pode alterar essa senha</p>
                    </div>

                    <div class="btn-conclui-cadastro">
                        <button type="submit" name="btn-cadastrar" class="btn btn-pesquisa-bibliotecario">Concluir Cadastro do Aluno</button>
                    </div> 
                    
                </form>
            </div>


            <?php 
                include '../components/footer.php'
            ?>
        </div>

        <!-- Script FontAwesome -->
        <script src="https://kit.fontawesome.com/a9ac96b7ba.js" crossorigin="anonymous"></script>

        <!-- Script Boostrap-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    </body>
</html>