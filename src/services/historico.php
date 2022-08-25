<?php 
    require("../utils/conexao.php")


    try{
        $consulta = $pdo->query("SELECT nome, username FROM pessoa;");
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "Nome: {$linha['nome']} - Usuário: {$linha['usuario']}<br />";
        }

    } catch{
        echo "error"
    }
    

?>