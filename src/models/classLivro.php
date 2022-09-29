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
			$sql = "SELECT codigo_livro, titulo, SUBSTRING(sinopse from 1 for 100) as sinopse  FROM $this->table";
			$stmt = Database::prepare($sql);			
			$stmt->execute();
			//retorna um array com os registros da tabela indexado pelo nome da coluna da tabela e por um número
			return $stmt->fetchAll(PDO::FETCH_BOTH );
			
		}

        public function listarTodosDadosLivro($id){
            //LISTAGEM ÚTIL
			$sql = "select distinct li.codigo_livro, li.titulo, li.sinopse, li.ISBN, li.data_publicacao, li.edicao, li.volume, li.qtd_paginas, ed.nome as editora, 
            autor.nome, cat.dsc_categoria, autor.nacionalidade, lpa.qtd_estrelas from livro as li
            join editora as ed                      on (li.FK_editora_codigo_edit = ed.codigo_edit)
            join livro_pessoa_avalia as lpa         on (lpa.FK_livro_codigo_livro = li.codigo_livro)
            join livro_categoria as lc              on (li.codigo_livro = lc.FK_livro_codigo_livro)
            join categoria as cat                   on (cat.codigo_categoria = lc.FK_categoria_codigo_categoria)
            join livro_autor as la                  on (li.codigo_livro = la.FK_autor_codigo_autor)
            join autor                              on (la.FK_autor_codigo_autor = autor.codigo_autor) 
            where li.codigo_livro = :codigo_livro";
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
            $sql="select distinct li.titulo, ps.nome, lpa.qtd_estrelas as nota from livro_pessoa_avalia as lpa 
            join livro as li on(lpa.FK_livro_codigo_livro = li.codigo_livro) 
            join pessoa as ps on (lpa.FK_pessoa_codigo_pessoa = ps.codigo_pessoa) where codigo_livro = :codigo_livro";
			$stmt = Database::prepare($sql);	
			$stmt->bindParam(':codigo_livro', $id);
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_BOTH );
        }

        public function listarHistorico($id_pessoa){
            $sql="select distinct li.titulo, SUBSTRING(li.sinopse from 1 for 100) as sinopse, li.ISBN, li.data_publicacao, li.edicao, li.volume, 
            li.qtd_paginas, ed.nome as editora, autor.nome, cat.dsc_categoria, autor.nacionalidade, lpa.qtd_estrelas, pes.nome as aluno, locado.data_entrega
            from livro_pessoa_loca as locado
            join livro as li                    on (li.codigo_livro = locado.FK_LIVRO_codigo_livro)
            join pessoa as pes                  on (pes.codigo_pessoa = locado.FK_pessoa_codigo_pessoa)
            join editora as ed                  on (li.FK_editora_codigo_edit = ed.codigo_edit)
            join livro_pessoa_avalia as lpa     on (lpa.FK_livro_codigo_livro = li.codigo_livro)
            join livro_categoria as lc          on (li.codigo_livro = lc.FK_livro_codigo_livro)
            join categoria as cat               on (cat.codigo_categoria = lc.FK_categoria_codigo_categoria)
            join livro_autor as la              on (li.codigo_livro = la.FK_autor_codigo_autor)
            join autor                          on (la.FK_autor_codigo_autor = autor.codigo_autor) 
            where pes.codigo_pessoa = :codigo_pessoa";
			$stmt = Database::prepare($sql);	
			$stmt->bindParam(':codigo_pessoa', $id_pessoa);
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


        public function update($id){
            $sql="UPDATE $this->table SET ISBN = :ISBN, data_publicacao = :data_publicacao, titulo = :titulo WHERE codigo_livro = :id";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':ISBN', $this->ISBN);
            $stmt->bindParam(':data_publicacao', $this->data_publicacao);
            $stmt->bindParam(':titulo', $this->titulo);

            return $stmt->execute();
        }


        #########     FUNÇÕES DE LISTAGEM ESPECÍFICA     ###########

        public function rankingNota(){
            //ranking de avaliações
            $sql = "select sum(la.qtd_estrelas) as nota, l.titulo, SUBSTRING(l.sinopse from 1 for 100) as sinopse
            from livro_pessoa_avalia as la
            join livro as l on(la.fk_livro_codigo_livro = l.codigo_livro)
            group by l.codigo_livro order by sum(la.qtd_estrelas) desc";
            $stmt = Database::prepare($sql);			
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_BOTH );
        }

        public function buscarLivro($pesquisar){
			$sql="SELECT codigo_livro, titulo, SUBSTRING(sinopse from 1 for 100) as sinopse  FROM livro WHERE titulo ILIKE :pesquisar";
			$stmt = Database::prepare($sql);	
			$stmt->bindParam(':pesquisar', $pesquisar);
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_BOTH );
		}

        public function disponibilidade($codigo_livro){
            $sql="select distinct codigo_livro, titulo, dsc_status from livro_pessoa_loca lpl 
            join status_loca sl on(lpl.fk_status_loca_codigo_status=sl.codigo_status)
            join livro li on(lpl.fk_livro_codigo_livro=li.codigo_livro) where codigo_livro = :codigo_livro and dsc_status = 'disponivel'";
            $stmt = Database::prepare($sql);	
			$stmt->bindParam(':codigo_livro', $codigo_livro);
			$stmt->execute();

            $stmt->rowCount();
        }
    }
?>
