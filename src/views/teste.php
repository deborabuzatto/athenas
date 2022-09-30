
<?php 
    
    require("../models/classConexao.php");
    $arroz = 2;
    $sql="select count(*) as valor from (
    select livro.codigo_livro,livro.titulo,pessoa.nome,status_loca.codigo_status,lpl.data_locacao,lpl.data_entrega from livro_pessoa_loca lpl
    join livro
    on(livro.codigo_livro = lpl.fk_livro_codigo_livro)
    inner join pessoa
    on (pessoa.codigo_pessoa = lpl.fk_pessoa_codigo_pessoa)
    inner join status_loca
    on status_loca.codigo_status = lpl.fk_status_loca_codigo_status
    where livro.codigo_livro=:codigo_livro and status_loca.codigo_status = 1) as teste";
    $stmt = Database::prepare($sql);	
    $stmt->bindParam(':codigo_livro', $arroz);
    $stmt->execute();
    $dados = $stmt->fetch();
        

    print_r($dados['valor']);

?>