<?php
    include '../models/classLivro.php';
    session_start();
    $aluno = $_SESSION['aluno'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../components/header.php'; ?>
        <title>MEU HISTÓRICO</title>
    </head>
    <body>
        <div class="nav-login">
            <div class="nav-link-item">
                <a href="homeAlunos.php"><i class="fa fa-arrow-left-long"></i>Página Inicial</a>
            </div>

            <div class="page-info-name">
                <p>Você está vendo:</p><a href="#">Seu histórico</a>
            </div>

            <div class="nav-login-menu">
                <img src="/public/static/imagens/athenas.png">
                <p>"A leitura desenvolve a mente. O pensamento a alma."</p>
            </div>
        </div>


        <div class="centralizar-livros mt-5 pt-5">
            <table class="table table-striped table-hover mb-5">
                <thead>
                    <tr>
                        <th colspan="7" class="cabecalho"><h3>Seu relatório de leituras</h3> <p class="text-success">Entregue seus livros em até 7 dias</p></th>
                    </tr>
                </thead>
                <thead>
                    <tr class="cabecalho">
                        <th>Nome do aluno</th>
                        <th>Nome da obra locada</th>
                        <th>Data de recebimento</th>
                        <th>Data de entrega</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $dado = new Livro();
                        $busca = $dado->listarHistorico($aluno);
                        if(count($busca)>0){
                            foreach($busca as $dados){
                    ?>
                    <tr>
                        <td class="text-start"><?php echo $dados['nome'];?></td>
                        <td class="text-start"><?php echo $dados['titulo'];?></td>
                        <td ><?php echo $dados['data_locacao'];?></td>
                        <td ><?php echo $dados['data_entrega'];?></td>
                        <?php
                            $locacao = $dados['data_locacao'];
                            $entrega = $dados['data_entrega'];
                            if(empty($entrega)){
                                $entrega = '0000-00-00';
                            }
                            
                            $dia_entrega = substr($entrega, 8, 2);  // abcd
                            $dia_locacao = substr($locacao, 8, 2);  // abcd
                            $ent = intval($dia_entrega); $loc = intval($dia_locacao);
                            $resultado =  $ent - $loc;
                            if($resultado < 0 && $resultado > -7){
                                $imprimir = 'livro em leitura';
                            }
                            if($resultado < 0 && $resultado < -7){
                                $imprimir = 'livro não entregue';
                            }
                            if($resultado >= 0 && $resultado < 7){
                                $imprimir = 'livro entregue no prazo';
                            }
                            if($resultado > 0 && $resultado > 7){
                                $imprimir = 'livro entregue fora do prazo';
                            }                        
                        ?>
                        
                        <td class="text-start"><?php echo $imprimir;?></td>
                    </tr>
                    <?php }} ?>
                </tbody>
            </table>
        </div>
    <?php include '../components/footer.php'; ?>
	<?php include '../components/scriptsBody.php'; ?>
</body>
</html>