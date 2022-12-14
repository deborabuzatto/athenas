<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include '/src/components/header.php'; ?>
    <title>Athenas</title>
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
                <li class="nav-item">
                    <a class="nav-link" href="https://github.com/Jordana-Santos/Projeto-Integrador" target="_blank">Docs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#projeto">Projeto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contato">Contato</a>
                </li>
            </ul>
        </div>
        <a href="/src/views/login.php" class="btn-login btn grow_box" type="button">
            <i class="fa fa-user"></i> Login
        </a>
    </nav>

    <div class="centralizar-txt">
    <p class="ball"></p>
    <h1>Serviço bibliotecário gratuito para instituições sem fins lucrativos</h1>
    <p class="shadow"></p>
    </div>

    <div class="img-bg">
    <img src="/public/static/imagens/multidao-de-pessoas-de-diferentes-idades-e-racas_74855-5235-removebg-preview.png" alt="Pessoas">
    </div>

    <div class="conteudo-2 centralizar-txt">
        <h1 style="color: #7625C9;">Primeiro acesso? - Alunos</h1>
        <div class="alinhar-p">
            <p>Passo 1 - Vá até a biblioteca da sua instuição, faça seu cadastro e receba sua senha padrão.</p>
            <p>Passo 2 - Faça login utilizando seu e-mail cadastrado e a senha padrão recebida na biblioteca.</p>
            <p>Passo 3 - Ao acessar o sistema, troque sua senha para alguma senha de sua escolha e aproveite.</p>
        </div>
    </div>

    <div class="cartoes" id="projeto">
        <div class="cartao amarelo">
            <h1>Proposta - Athenas</h1>
            <p>Prestar um serviço de biblioteca gratuito para instituições sem fins lucrativos, com inteface dinâmica para usuários e bibliotecarios. 
                Desenvolvido por alunos de uma instituição federal, nossa proposta é tornar a leitura acessível para todos.
            </p>
        </div>
        <div class="cartao vermelho">
            <h1>Funcionalidades</h1>
            <p>Foram sintetizadas diversas experiências, visando abranger todos os usuários do sistema. São fornecidos ao bibliotecário, 
                tudo que é necessário para organização e gestão do sistema, permitindo então a manutenção do acervo. 
                Ao aluno, buscamos oferecer o máximo de dinamicidade e interação, para que a leitura seja totalmente imersiva.
            </p>
        </div>
        <div class="cartao azul">
            <h1>Desenvolvedores</h1>
            <p>O projeto Athenas foi desenvolvido por três estudantes, no último ano do curso técnico de Informática para Internet, no Instituto Federal do Espírito Santo. 
                Apresentado como trabalho de conclusão de curso, 
                o projeto levou 10 meses para ser completamente pensado e executado, afim de fornecer para você uma experiência personalizada e memorável.
            </p>
        </div>
    </div>

    <div class="conteudo-3 centralizar-txt" id="contato">
        <h1 style="color: #7625C9; margin-bottom: 40px;">Contato com os desenvolvdedores</h1>
        <div class="inputs">
            <form method="post" action="/src/services/action.php">
                <div>
                    <input class="input" type="text" id="nome" name="nome" placeholder="Nome Completo" autocomplete="off" required>
                </div>
                <div>
                    <input class="input" type="text" id="email" name="email" placeholder="E-mail" autocomplete="off" required>
                </div>
                <div>
                    <textarea class="textarea" id="message" name="message" placeholder="Mensagem..." style="height: 180px;" required></textarea>
                </div>
                <div class="wrap">
                    <button class="button">Enviar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="align-solicitar">
        <div class="solicitar">
            <p>Para implementar o sistema, entre em contato com os desenvolvedores através do formulário acima, informe o nome e o e-mail da instituição, assim como o motivo o papel social da instituição e aguarde contato.</p>
        </div>
    </div>

    <?php include '/src/components/footer.php'; ?>
    <?php include '/src/components/scriptsBody.php'; ?>
        
</body>
</html>