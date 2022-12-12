<?php include '../models/classLivro.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../components/header.php'; ?>
    <title>RELATÓRIO ATHENAS</title>
</head>
<body>
    <?php include '../components/navbar.php'; ?>
    <div class="centralizar-livros ">
        <button class="btn-login button mt-5" type="button" onclick="printJS({ printable: 'relatorio', type: 'html', css: '/public/static/css/style.css'})">Imprimir</button>
    </div>
    <div id="relatorio" class="centralizar-livros mt-5 mb-5">
        <table class="table table-striped table-hover mb-5">
            <thead>
                <tr>
                    <th colspan="7" class="cabecalho"><h3>Relatório mensal da circulação de obras literárias</th>
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
                    $dados = new Livro();
                    $busca = $dados->relatorio();
                    if(!empty($busca)){
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
    
    <script src="print.js"></script>
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    <script src="https://printjs-4de6.kxcdn.com/print.min.css"></script>
    <?php include '../components/footer.php'; ?>
	<?php include '../components/scriptsBody.php'; ?>

</body>
</html>