<?php
    class Graficos extends CRUD{

        public function graficos_idade(){
            $sql="SELECT qtd, dta from 
            (select 'menores de 16' as dta, count(*) as qtd 
             from pessoa where date_part('year',age(data_nasc)) < 16 
             UNION ALL
             select 'Entre 16 e 18' as dta, count(*) as qtd 
             from pessoa where date_part('year',age(data_nasc)) between 16 and 18
             UNION ALL
             select 'maiores de 18' as dta, count(*) as qtd 
             from pessoa where date_part('year',age(data_nasc)) > 18) as dados";
            $stmt = Database::prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_BOTH);
        }

        public function graficos_avaliacoes(){
            //ranking de avaliações
            $sql = "select trunc( AVG(lpa.qtd_estrelas),0) as nota, li.codigo_livro as codigo, li.titulo, SUBSTRING(li.sinopse from 1 for 100) as sinopse, 
            li.ISBN, li.data_publicacao, li.volume, li.qtd_paginas, ed.nome as editora,
            autor.nome as autor, cat.dsc_categoria as categoria, autor.nacionalidade as nacao from livro as li
            full outer join editora as ed                      on (li.FK_editora_codigo_edit = ed.codigo_edit)
            full outer join livro_pessoa_avalia as lpa         on (lpa.FK_livro_codigo_livro = li.codigo_livro)
            full outer join livro_categoria as lc              on (li.codigo_livro = lc.FK_livro_codigo_livro)
            full outer join categoria as cat                   on (cat.codigo_categoria = lc.FK_categoria_codigo_categoria)
            full outer join livro_autor as la                  on (li.codigo_livro = la.FK_autor_codigo_autor)
            full outer join autor                              on (la.FK_autor_codigo_autor = autor.codigo_autor)
            group by  editora,codigo,autor,categoria,nacao order by nota desc nulls last LIMIT 5";
            $stmt = Database::prepare($sql);			
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_BOTH );
        }
    }
?>