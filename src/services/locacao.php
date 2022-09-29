<?php

$livro = new Livro();
$livro->disponibilidade($codigo_livro);
if($livro == null){
    $disponibilidade = 'indisponivel';
}else{
    $disponibilidade = 'disponivel';
}

?>