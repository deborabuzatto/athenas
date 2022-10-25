<?php 
    //Classe Aluno
    include_once '../models/classLivro.php';
    include_once '../models/classAluno.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GERENCIAR CICLOS</title>


    <!-- Css externo -->
    <link rel="stylesheet" href="/public/static/css/style.css">
</head>
<body>

    <!--Idade dos usuarios -->
    <?php
        $grafic = new Livro();
        $imprimir = $grafic->graficos_idade();
        if($imprimir){
            foreach($imprimir as $dados){
    ?>
    <input type="hidden" value="<?php echo $dados["qtd"]?>" class="grafico">
    <?php
    }}
    ?>
    <div class="esquerda">
        <div class="canvas-container">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <!-- Mais queridinhos -->
    <?php
        $grafic = new Livro();
        $imprimir = $grafic->graficos_avaliacoes();
        if($imprimir){
            foreach($imprimir as $dados){
    ?>
    <input type="hidden" value="<?php echo $dados["titulo"]?>" class="titulo">
    <input type="hidden" value="<?php echo $dados["nota"]?>" class="avaliacoes">
    <?php
    }}
    ?>
    <div class="centralizar">
        <div class="canvas-container">
            <canvas id="categoria"></canvas>
        </div>
    </div>
    <div class="esquerda">
        <div class="canvas-container">
            <canvas id="favorito"></canvas>
        </div>
    </div>

    



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../services/script.js"></script>
</body>
</html>