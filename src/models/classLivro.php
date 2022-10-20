<?php
    require_once 'classCrud.php';

    class Livro extends CRUD{
        protected $table = 'livro';
        protected $id = 'codigo_livro';
        protected $buscar = 'titulo';

        private $ISBN;
        private $data_publicacao;
        private $titulo;
        private $sinopse;
        private $comentario;
        private $nota;
        private $autor;
        private $nacionalidade;
        private $editora;
        private $categoria;

        public function setISBN($ISBN){
            $this->ISBN = $ISBN;
        }
        public function getISBN(){
            return $this->ISBN;
        }
        public function setdata_publicacao($data_publicacao){
            $this->data_publicacao = $data_publicacao;
        }
        public function getdata_publicacao(){
            return $this->data_publicacao;
        }
        public function settitulo($titulo){
            $this->titulo = $titulo;
        }
        public function gettitulo(){
            return $this->titulo;
        }
        public function setsinopse($sinopse){
            $this->sinopse = $sinopse;
        }
        public function getsinopse(){
            return $this->sinopse;
        }
        public function setcomentario($comentario){
            $this->comentario = $comentario;
        }
        public function getcomentario(){
            return $this->comentario;
        }
        public function setnota($nota){
            $this->nota = $nota;
        }
        public function getnota(){
            return $this->nota;
        }
        public function setautor($autor){
            $this->autor = $autor;
        }
        public function getautor(){
            return $this->autor;
        }
        public function setnacionalidade($nacionalidade){
            $this->nacionalidade = $nacionalidade;
        }
        public function getnacionalidade(){
            return $this->nacionalidade;
        }
        public function seteditora($editora){
            $this->editora = $editora;
        }
        public function geteditora(){
            return $this->editora;
        }
        public function setcategoria($categoria){
            $this->categoria = $categoria;
        }
        public function getcategoria(){
            return $this->categoria;
        }

        

        #########     FUNÇÕES DE LISTAGEM DE DADOS     ###########


        public function findAllLivro(){
            //LISTAGEM PARA TABELA
			$sql = "select codigo_livro, titulo, cat.dsc_categoria as categoria, trunc( AVG(lpa.qtd_estrelas),1) as nota,  SUBSTRING(sinopse from 1 for 100) as sinopse  
            FROM livro as li 
            full outer join livro_categoria as lc              on (li.codigo_livro = lc.FK_livro_codigo_livro)
            full outer join categoria as cat                   on (cat.codigo_categoria = lc.FK_categoria_codigo_categoria)
            full outer join livro_pessoa_avalia as lpa         on (lpa.FK_livro_codigo_livro = li.codigo_livro)
            group by  codigo_livro,titulo,categoria,sinopse
            ";
			$stmt = Database::prepare($sql);			
			$stmt->execute();
			//retorna um array com os registros da tabela indexado pelo nome da coluna da tabela e por um número
			return $stmt->fetchAll(PDO::FETCH_BOTH );
			
		}

        public function listarTodosDadosLivro($id){
            //LISTAGEM ÚTIL
			$sql = "select trunc( AVG(lpa.qtd_estrelas),0) as nota, li.codigo_livro as codigo, li.titulo, li.sinopse, li.ISBN, li.data_publicacao, 
            li.edicao, li.volume, li.qtd_paginas, ed.nome as editora, 
            autor.nome as autor, cat.dsc_categoria as categoria, autor.nacionalidade as nacao from livro as li
            full outer join editora as ed                      on (li.FK_editora_codigo_edit = ed.codigo_edit)
            full outer join livro_pessoa_avalia as lpa         on (lpa.FK_livro_codigo_livro = li.codigo_livro)
            full outer join livro_categoria as lc              on (li.codigo_livro = lc.FK_livro_codigo_livro)
            full outer join categoria as cat                   on (cat.codigo_categoria = lc.FK_categoria_codigo_categoria)
            full outer join livro_autor as la                  on (li.codigo_livro = la.FK_autor_codigo_autor)
            full outer join autor                              on (la.FK_autor_codigo_autor = autor.codigo_autor)
			where codigo_livro = :codigo_livro
            group by  editora,codigo,autor,categoria,nacao";
			$stmt = Database::prepare($sql);
            $stmt->bindParam(':codigo_livro', $id);		
			$stmt->execute();
			//retorna um array com os registros da tabela indexado pelo nome da coluna da tabela e por um número
			return $stmt->fetchAll(PDO::FETCH_BOTH );
			
		}

        public function listarCategoria(){
            $sql="SELECT * from categoria";
            $stmt = Database::prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_BOTH );
        }

        public function listarAvaliacoes($id){
            $sql="select trunc( AVG(lpa.qtd_estrelas),0) as nota, li.codigo_livro as codigo, li.titulo, li.sinopse, li.ISBN, li.data_publicacao, 
            li.edicao, li.volume, li.qtd_paginas, ed.nome as editora, pes.nome as pessoa,
            autor.nome as autor, cat.dsc_categoria as categoria, autor.nacionalidade as nacao from livro as li
            full outer join editora as ed                      on (li.FK_editora_codigo_edit = ed.codigo_edit)
            join livro_pessoa_avalia as lpa                    on (lpa.FK_livro_codigo_livro = li.codigo_livro)
            full outer join livro_categoria as lc              on (li.codigo_livro = lc.FK_livro_codigo_livro)
            full outer join categoria as cat                   on (cat.codigo_categoria = lc.FK_categoria_codigo_categoria)
            full outer join livro_autor as la                  on (li.codigo_livro = la.FK_autor_codigo_autor)
            full outer join autor                              on (la.FK_autor_codigo_autor = autor.codigo_autor)
            full outer join pessoa as pes                      on (lpa.FK_pessoa_codigo_pessoa = pes.codigo_pessoa)
			where lpa.FK_livro_codigo_livro = :codigo_livro
            group by  editora,codigo,autor,categoria,nacao,pessoa";
			$stmt = Database::prepare($sql);	
			$stmt->bindParam(':codigo_livro', $id);
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_BOTH );
        }

        public function listarHistorico($id){
            $sql="select distinct li.titulo, li.codigo_livro, SUBSTRING(li.sinopse from 1 for 100) as sinopse, li.ISBN, li.data_publicacao, li.edicao, li.volume, li.qtd_paginas, ed.nome as editora, autor.nome, cat.dsc_categoria as categoria, autor.nacionalidade, lpa.qtd_estrelas, pes.nome as aluno, locado.data_entrega
            from livro_pessoa_loca as locado
            full outer join livro as li                    on (li.codigo_livro = locado.FK_LIVRO_codigo_livro)
            full outer join pessoa as pes                  on (pes.codigo_pessoa = locado.FK_pessoa_codigo_pessoa)
            full outer join editora as ed                  on (li.FK_editora_codigo_edit = ed.codigo_edit)
            full outer join livro_pessoa_avalia as lpa     on (lpa.FK_livro_codigo_livro = li.codigo_livro)
            full outer join livro_categoria as lc          on (li.codigo_livro = lc.FK_livro_codigo_livro)
            full outer join categoria as cat               on (cat.codigo_categoria = lc.FK_categoria_codigo_categoria)
            full outer join livro_autor as la              on (li.codigo_livro = la.FK_autor_codigo_autor)
            full outer join autor                          on (la.FK_autor_codigo_autor = autor.codigo_autor)
            where pes.codigo_pessoa = :codigo_pessoa";
			$stmt = Database::prepare($sql);	
			$stmt->bindParam(':codigo_pessoa', $id);
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_BOTH );
        }




        #########     FUNÇÕES DE INSERÇÃO DE DADOS     ###########


        public function insert(){
            //insere editora
            $sql3="INSERT INTO editora (nome) VALUES (:nome) returning codigo_edit";
            $stmt3 = Database::prepare($sql3);
            $stmt3->bindParam(':nome', $this->editora);
            $stmt3->execute();
            $FK_EDITORA_codigo_edit = $stmt3->fetch()["codigo_edit"];
            
            //insere na tabela livro
            $sql="INSERT INTO $this->table (ISBN, data_publicacao, titulo, sinopse, FK_EDITORA_codigo_edit) VALUES (:ISBN,:data_publicacao,:titulo, :sinopse, :FK_EDITORA_codigo_edit) returning codigo_livro";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':ISBN', $this->ISBN);
            $stmt->bindParam(':data_publicacao', $this->data_publicacao);
            $stmt->bindParam(':titulo', $this->titulo);
            $stmt->bindParam(':sinopse', $this->sinopse);
            $stmt->bindParam(':FK_EDITORA_codigo_edit', $FK_EDITORA_codigo_edit);
            $stmt->execute();

            //insere autor na tabela autor
            $sql1="INSERT INTO autor (nome, nacionalidade) VALUES (:nome, :nacionalidade) returning codigo_autor";
            $stmt1 = Database::prepare($sql1);
            $stmt1->bindParam(':nome', $this->autor);
            $stmt1->bindParam(':nacionalidade', $this->nacionalidade);
            $stmt1->execute();

            //associa o autor ao livro
            $FK_LIVRO_codigo_livro = $stmt->fetch()["codigo_livro"]; //id do livro inserido agora
            $FK_LIVRO_codigo_autor = $stmt1->fetch()["codigo_autor"]; //id do autor inserido agora
            $sql2="INSERT INTO livro_autor (FK_LIVRO_codigo_livro, FK_AUTOR_codigo_autor) VALUES (:FK_LIVRO_codigo_livro, :FK_AUTOR_codigo_autor)";
            $stmt2 = Database::prepare($sql2);
            $stmt2->bindParam(':FK_LIVRO_codigo_livro', $FK_LIVRO_codigo_livro);
            $stmt2->bindParam(':FK_AUTOR_codigo_autor', $FK_LIVRO_codigo_autor);            
            $stmt2->execute();

            //associar a categoria selecionada ao livro
            $sql5="INSERT INTO livro_categoria (FK_categoria_codigo_categoria, FK_livro_codigo_livro) VALUES (:FK_categoria_codigo_categoria, :FK_LIVRO_codigo_livro)";
            $stmt5 = Database::prepare($sql5);
            $stmt5->bindParam(':FK_categoria_codigo_categoria', $this->categoria);
            $stmt5->bindParam(':FK_LIVRO_codigo_livro', $FK_LIVRO_codigo_livro);
            $stmt5->execute();
            
        }


        public function inserirAvaliacoes($codigo_livro, $codigo_pessoa,  $nota, $dsc_comentario){
            $sql = "INSERT INTO livro_pessoa_avalia (FK_pessoa_codigo_pessoa, FK_livro_codigo_livro, qtd_estrelas) VALUES (:codigo_pessoa,:codigo_livro,:nota);";
			$stmt = Database::prepare($sql);	
            $stmt->bindParam(':codigo_pessoa', $codigo_pessoa);
			$stmt->bindParam(':codigo_livro', $codigo_livro);
            $stmt->bindParam(':nota', $nota);
			$stmt->execute();

            $sql1 = "INSERT INTO comentario (dsc_comentario) VALUES (:dsc_comentario)";
			$stmt1 = Database::prepare($sql1);
            $stmt1->bindParam(':dsc_comentario', $dsc_comentario);
			$stmt1->execute();

			return true;
        }


        #########     FUNÇÕES DE ATUALIZAÇÃO DE DADOS     ###########

        
        public function locacao($codigo_livro, $codigo_pessoa){
            //exibe se o livro está disponível ou não
            $sql="select count(*) as valor from (select livro.codigo_livro,livro.titulo,pessoa.nome,status_loca.codigo_status,
            lpl.data_locacao,lpl.data_entrega from livro_pessoa_loca lpl
            join livro                       on(livro.codigo_livro = lpl.fk_livro_codigo_livro)
            inner join pessoa                on (pessoa.codigo_pessoa = lpl.fk_pessoa_codigo_pessoa)
            inner join status_loca           on status_loca.codigo_status = lpl.fk_status_loca_codigo_status
            where livro.codigo_livro=:codigo_livro and status_loca.codigo_status=1) as teste";
            $stmt = Database::prepare($sql);	
            $stmt->bindParam(':codigo_livro', $codigo_livro);
            $stmt->execute();
            $dados = $stmt->fetch();

            if($dados['valor'] === "0"){//disponivel, possivel locar, cria a locacao com status locado:
                $sql1 = 'insert into livro_pessoa_loca 
                (fk_livro_codigo_livro, fk_pessoa_codigo_pessoa, fk_status_loca_codigo_status)
                values (:codigo_livro, :codigo_pessoa, 1)';
                $stmt1 = Database::prepare($sql1);	
                $stmt1->bindParam(':codigo_livro', $codigo_livro);
                $stmt1->bindParam(':codigo_pessoa', $codigo_pessoa);
                $stmt1->execute();

                return true;
            }
            else{//se estiver locado, só é possível devolver, então muda o status para disponivel
                $sql2 = 'update livro_pessoa_loca 
                set fk_status_loca_codigo_status = 2
                where fk_livro_codigo_livro = :codigo_livro 
                and fk_pessoa_codigo_pessoa = :codigo_pessoa;';
                $stmt2 = Database::prepare($sql2);	
                $stmt2->bindParam(':codigo_livro', $codigo_livro);
                $stmt2->bindParam(':codigo_pessoa', $codigo_pessoa);
                $stmt2->execute();

                return true;
            }
        }


        #########     FUNÇÕES DE LISTAGEM ESPECÍFICA     ###########

        public function rankingNota(){
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
            group by  editora,codigo,autor,categoria,nacao order by nota desc nulls last";
            $stmt = Database::prepare($sql);			
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_BOTH );
        }

        public function buscarLivro($pesquisar){
			$sql="select codigo_livro, titulo, cat.dsc_categoria as categoria, trunc( AVG(lpa.qtd_estrelas),1) as nota,  SUBSTRING(sinopse from 1 for 100) as sinopse  
            FROM livro as li 
            full outer join livro_categoria as lc              on (li.codigo_livro = lc.FK_livro_codigo_livro)
            full outer join categoria as cat                   on (cat.codigo_categoria = lc.FK_categoria_codigo_categoria)
            full outer join livro_pessoa_avalia as lpa         on (lpa.FK_livro_codigo_livro = li.codigo_livro)
            WHERE titulo ILIKE :pesquisar or dsc_categoria ILIKE :pesquisar
            group by  codigo_livro,titulo,categoria,sinopse";
			$stmt = Database::prepare($sql);	
			$stmt->bindParam(':pesquisar', $pesquisar);
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_BOTH );
		}


        public function disponibilidade($codigo_livro){
            //exibe se o livro está disponível ou não
            $sql="select count(*) as valor from (select livro.codigo_livro,livro.titulo,pessoa.nome,status_loca.codigo_status,
            lpl.data_locacao,lpl.data_entrega from livro_pessoa_loca lpl
            join livro                       on(livro.codigo_livro = lpl.fk_livro_codigo_livro)
            inner join pessoa                on (pessoa.codigo_pessoa = lpl.fk_pessoa_codigo_pessoa)
            inner join status_loca           on status_loca.codigo_status = lpl.fk_status_loca_codigo_status
            where livro.codigo_livro=:codigo_livro and status_loca.codigo_status=1) as teste";
            $stmt = Database::prepare($sql);	
            $stmt->bindParam(':codigo_livro', $codigo_livro);
            $stmt->execute();
            return $stmt->fetch();
        }


        #########     FUNÇÃO DE EXCLUSÃO    ###########


        public function excluir($id){
            $sql8="DELETE FROM livro_categoria WHERE fk_livro_codigo_livro = :id";
            $stmt8 = Database::prepare($sql8);	
            $stmt8->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt8->execute();

            $sql7="DELETE FROM livro_autor WHERE fk_livro_codigo_livro = :id";
            $stmt7 = Database::prepare($sql7);	
            $stmt7->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt7->execute();

            $sql1="DELETE FROM livro_pessoa_avalia WHERE fk_livro_codigo_livro = :id";
            $stmt1 = Database::prepare($sql1);	
            $stmt1->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt1->execute();

            $sql4="DELETE FROM livro_pessoa_loca WHERE fk_livro_codigo_livro = :id";
            $stmt4 = Database::prepare($sql4);	
            $stmt4->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt4->execute();

            $sql="DELETE FROM livro WHERE codigo_livro = :id";
			$stmt = Database::prepare($sql);	
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
        }
    }
?>
