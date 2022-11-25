<?php include '../models/classLivro.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RELATÓRIO ATHENAS</title>
</head>
<body>
    <div id="relatorio">
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th colspan="7" style="border-style: double; border-left: none; border-right: none; border-color: black;"><h3>Relatório mensal da circulação de obras literárias</th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th>Locação</th>
                    <th>Nome do aluno</th>
                    <th colspan="2" style="padding-right: 10px">Nome da obra locada</th>
                    <th>Data de recebimento</th>
                    <th>Data de entrega</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $dados = new Livro();
                    $busca = $dados->relatorio();
                    if(count($busca)>0){
                        foreach($busca as $dados){
                ?>
                <tr>
                    <td></td>
                    <td style="padding-right: 10px"><?php echo $dados['nome'];?></td>
                    <td colspan="2" style="padding-right: 10px"><?php echo $dados['titulo'];?></td>
                    <th style="padding-right: 10px"><?php echo $dados['data_locacao'];?></th>
                    <td style="padding-right: 10px"><?php echo $dados['data_entrega'];?></td>
                    <td style="padding-right: 10px; color: orange">Entregue com Atraso</td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>

    </div>
    <button type="button" onclick="printJS({ printable: 'relatorio', type: 'html'})">Imprimir</button>
    <script src="print.js"></script>
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    <script src="https://printjs-4de6.kxcdn.com/print.min.css"></script>
</body>
</html>