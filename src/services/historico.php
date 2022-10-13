<?php

    $db = require("../utils/conexao.php");

    try {

        $consulta = $db->query('SELECT nome, username from pessoa');

        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "Nome: {$linha['nome']} User: {$linha['username']}<br />";
        }

        } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        }
?>