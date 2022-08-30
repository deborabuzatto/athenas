<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Padrão -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Link font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="shortcut icon" href="/favicon/favicon.ico"/>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;700&family=Radio+Canada:wght@300&family=Roboto+Mono:wght@200&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Piazzolla:opsz,wght@8..30,200;8..30,300&display=swap" rel="stylesheet">

        <!-- Css externo -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        
        <link rel="stylesheet" href="/public/static/css/style.css">        

        <!--<script src="js/api.js"></script>-->

        <title>Teste 1</title>
    </head>
    <body>
        <div class="tela">
            <nav class="navbar navbar-expand-lg ">
                <a class="navbar-brand div-nav" href="#"><img src="imagens/athenas.png"></a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#barraNavegacao" aria-expanded="false" >
                    <i class="fa-solid fa-bars-staggered"></i>
                </button>

                <div class="collapse navbar-collapse" id="barraNavegacao">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#projeto">Projeto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#equipe">Equipe</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contato">Contato</a>
                        </li>
                    </ul>
                    <div class="btn-login">
                        <a href="login.php">Login</a>
                    </div>
                </div>
            </nav>
            
            <!---<div class="conteudo-index">
                <img src="imagens/front-view-school-kids-reading.jpg">
            </div>-->

            <div class=" servico">
                <h1>Serviço <span >bibliotecário</span> gratuito para instituições sem fins lucrativos</h1>
            </div>

            <div class="acesso">
                <div class="informes-login">
                    <h2>Primeiro acesso? - Alunos</h2>

                    <p>Passo 1 - Vá até a biblioteca da sua instuição, faça seu cadastro e receba sua senha padrão.</p>

                    <p>Passo 2 - Faça login através do formulário ao lado, será usado seu nome, e-mail e a senha padrão</p>
                    
                    <p>Passo 3 - Assim que acessar o sistema, troque sua senha para alguma senha de sua escolha e aproveite.</p>
                </div>
                <div class="form-login">
                    <form>
                        <div class="mb-3">
                            <label for="inputUsuario" class="form-label">Usuário:</label>
                            <input type="text" class="form-control" id="nameusuario" aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="inputEmail">
                        </div>

                        <div class="mb-3">
                            <label for="inputSenha" class="form-label">Senha:</label>
                            <input type="password" class="form-control" id="inputSenha">
                        </div>

                        <button type="submit" class="btn btn-primary">Acessar</button>
                    </form>
                </div>
            </div>

            <div class="conteudo" id="projeto" >
                <h2>Proposta - Athenas</h2>

                <p>Prestar um serviço de biblioteca gratuito para instituições sem fins lucrativos, com inteface dinâmica para usuários e bibliotecarios. Desenvolvido por alunos de uma instituição federal, nossa proposta é tornar a leitura acessível para todos.</p>

                <h2>Funcionalidades - Athenas</h2>

                <p>Foram pensadas em duas experiências completamente diferentes, para atender aos dois tipos de usuários que usariam o sistema. São fornecidos ao bibliotecário, tudo que é necessário para organização e gestão do sistema, assim como a possibilidade de incluir, excluir, consultar e editar o cadastro de livros. Ao aluno, buscamos oferecer o máximo de dinamicidade e interação, para que a leitura seja totalmente prazeirosa, sendo permitido, alocar livros físicos da biblioteca da instituição, favoritar e opinar sobre as obras que forem lidas, assim como ver a opinião de outros leitores, sobre o mesmo livro.
                </p>

                <h2>Documentação do Projeto</h2>
                <p class="links">
                    <a href="">Leia o projeto do sistema <i class="fa fa-arrow-right-long"></i></a>
                    <a href="">Estrutura Banco de dados <i class="fa fa-arrow-right-long"></i></a>
                    <a href="">Documentação Completa <i class="fa fa-arrow-right-long"></i></a>
                </p>
                

                <h2 id="equipe">Desenvolvedores - Athenas</h2>

                <p>O projeto Athenas foi desenvolvido por três estudantes, no último ano do curso técnico de Informática para Internet, no Instituto Federal do Espírito Santo. Apresentado como trabalho de conclusão de curso, o projeto levou 10 meses para ser completamente pensado e executado, afim de fornecer para você uma experiência personalizada e memorável.
                </p>
            </div>

            <div class="contato" id="contato">
                <div class="form-contato">
                    <h2>Entrar em contato - Desenvolvedores</h2>
                    <form>
                        <div class="mb-3">
                            <label for="nomeContato" class="form-label">Nome Completo:</label>
                            <input type="text" class="form-control" id="nomeContato" aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label for="emailContato" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="emailContato">
                        </div>

                        <div class="mb-3">
                            <label for="textoContato" class="form-label">Conteudo da mensagem:</label>
                            <textarea  class="form-control" id="textoContato"></textarea>
                        </div>

                        <button type="submit" class="btn btn-email">Enviar e-mail</button>
                    </form>
                </div>

                <div class="img-form">
                    <img src="/public/static/imagens/img-form.jpg">
                </div>
            </div>
            
            <div class="conteudo">
                <h2>Solicitar sistema - Instituições</h2>

                <p>Para implementar o sistema, entre em contato com os desenvolvedores através do formulário acima, informe o nome e o e-mail da instituição, assim como o motivo o papel social da instituição e aguarde contato.</p>

            </div>

            <?php include("components/footer.php")?>
        </div>

        <!-- Script FontAwesome -->
        <script src="https://kit.fontawesome.com/a9ac96b7ba.js" crossorigin="anonymous"></script>

        <!-- Script Boostrap-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    </body>
</html>