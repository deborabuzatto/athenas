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
			$sql = "select distinct li.titulo, li.sinopse, li.ISBN, li.data_publicacao, li.edicao, li.volume, li.qtd_paginas, ed.nome as editora, 
            autor.nome, cat.dsc_categoria, autor.nacionalidade, lpa.qtd_estrelas from livro as li
            join editora as ed on (li.FK_editora_codigo_edit = ed.codigo_edit)
            join livro_pessoa_avalia as lpa on (lpa.FK_livro_codigo_livro = li.codigo_livro)
            join livro_categoria as lc on (li.codigo_livro = lc.FK_livro_codigo_livro)
            join categoria as cat on (cat.codigo_categoria = lc.FK_categoria_codigo_categoria)
            join livro_autor as la on (li.codigo_livro = la.FK_autor_codigo_autor)
            join autor on (la.FK_autor_codigo_autor = autor.codigo_autor) 
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
            $sql="select distinct li.titulo, li.sinopse, li.ISBN, li.data_publicacao, li.edicao, li.volume, 
            li.qtd_paginas, ed.nome as editora, autor.nome, cat.dsc_categoria, autor.nacionalidade, lpa.qtd_estrelas, pes.nome as aluno, locado.data_entrega
            from livro_pessoa_loca as locado
            join livro as li on (li.codigo_livro = locado.FK_LIVRO_codigo_livro)
            join pessoa as pes on (pes.codigo_pessoa = locado.FK_pessoa_codigo_pessoa)
            join editora as ed on (li.FK_editora_codigo_edit = ed.codigo_edit)
            join livro_pessoa_avalia as lpa on (lpa.FK_livro_codigo_livro = li.codigo_livro)
            join livro_categoria as lc on (li.codigo_livro = lc.FK_livro_codigo_livro)
            join categoria as cat on (cat.codigo_categoria = lc.FK_categoria_codigo_categoria)
            join livro_autor as la on (li.codigo_livro = la.FK_autor_codigo_autor)
            join autor on (la.FK_autor_codigo_autor = autor.codigo_autor) 
            where pes.codigo_pessoa = :codigo_pessoa";
			$stmt = Database::prepare($sql);	
			$stmt->bindParam(':codigo_livro', $id_pessoa);
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_BOTH );
        }




        #########     FUNÇÕES DE INSERÇÃO DE DADOS     ###########


        public function insert(){
            $sql="INSERT INTO $this->table (ISBN, data_publicacao, titulo, sinopse) VALUES (:ISBN,:data_publicacao,:titulo, :sinopse) returning codigo_livro";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':ISBN', $this->ISBN);
            $stmt->bindParam(':data_publicacao', $this->data_publicacao);
            $stmt->bindParam(':titulo', $this->titulo);
            $stmt->bindParam(':sinopse', $this->sinopse);

            return $stmt->execute();
        }
        
        public function insertCategoria($categoria){
            $sql="SELECT dsc_categoria from categoria";
            $stmt = Database::prepare($sql);
            $stmt->execute();

            $dados = $stmt->fetchAll(PDO::FETCH_BOTH );
            foreach($dados as $cat){
                if($cat === $categoria){
                    return false;
                }
            }

            $sql="INSERT INTO categoria (dsc_categoria) VALUES (:dsc_categoria) returning codigo_categoria";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':dsc_categoria', $categoria);

            return $stmt->execute();
        }

        public function insertAutor($nome, $nacionalidade){
            $sql="INSERT INTO autor (nome, nacionalidade) VALUES (:nome, :nacionalidade) returning codigo_autor";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':nacionalidade', $this->nacionalidade);
            
            return $stmt->execute();
        }
        
        public function insertLivro_Autor($FK_LIVRO_codigo_livro, $FK_LIVRO_codigo_autor){
            $sql="INSERT INTO livro_autor (	FK_LIVRO_codigo_livro, FK_AUTOR_codigo_autor) VALUES (:FK_LIVRO_codigo_livro, :FK_AUTOR_codigo_autor)";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':FK_LIVRO_codigo_livro', $FK_LIVRO_codigo_livro);
            $stmt->bindParam(':FK_AUTOR_codigo_autor', $FK_LIVRO_codigo_autor);
            
            return $stmt->execute();
        }

        public function inserirAvaliacoes($codigo_livro, $codigo_pessoa,  $nota, $dsc_comentario){
            $sql = "INSERT INTO livro_pessoa_avalia (FK_pessoa_codigo_pessoa, FK_livro_codigo_livro, qtd_estrelas) VALUES (:codigo_livro,:codigo_pessoa,:nota); INSERT INTO comentario (':dsc_comentario')";
			$stmt = Database::prepare($sql);	
			$stmt->bindParam(':codigo_livro', $codigo_livro);
            $stmt->bindParam(':codigo_pessoa', $codigo_pessoa);
            $stmt->bindParam(':nota', $nota);
            $stmt->bindParam(':dsc_comentario', $dsc_comentario);
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_BOTH );
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


        #########     FUNÇÕES INDEFINIDA    ###########

        public function categoriaSelecionada($categoria, $FK_LIVRO_codigo_livro){
            $sql="SELECT codigo_categoria from categoria";
            $stmt = Database::prepare($sql);
            $stmt->execute();
            $dados = $stmt->fetchAll(PDO::FETCH_BOTH );
            foreach($dados as $cat){
                if($cat === $categoria){
                    $sql="INSERT INTO livro_categoria (	FK_LIVRO_codigo_livro, FK_CATEGORIA_codigo_categoria) VALUES (:FK_LIVRO_codigo_livro, :FK_CATEGORIA_codigo_categoria)";
                    $stmt = Database::prepare($sql);
                    $stmt->bindParam(':FK_LIVRO_codigo_livro', $FK_LIVRO_codigo_livro);
                    $stmt->bindParam(':FK_AUTOR_codigo_categoria', $cat);
                    
                    return $stmt->execute();
                }
            }
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
			$sql="SELECT titulo, SUBSTRING(sinopse from 1 for 100) as sinopse  FROM livro WHERE titulo ILIKE :pesquisar";
			$stmt = Database::prepare($sql);	
			$stmt->bindParam(':pesquisar', $pesquisar);
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_BOTH );
		}

        
        

    }
?>
