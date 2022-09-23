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

        /*function __construct($isbn, $data_publicacao, $titulo) {
            $this->isbn = $isbn;
            $this->data_publicacao = $data_publicacao;
            $this->titulo = $titulo;
        }*/
        public function findAllLivro(){
			$sql = "SELECT codigo_livro, titulo, SUBSTRING(sinopse from 1 for 100) as sinopse  FROM $this->table";
			$stmt = Database::prepare($sql);			
			$stmt->execute();
			//retorna um array com os registros da tabela indexado pelo nome da coluna da tabela e por um número
			return $stmt->fetchAll(PDO::FETCH_BOTH );
			
		}

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
        
        public function update($id){
            $sql="UPDATE $this->table SET ISBN = :ISBN, data_publicacao = :data_publicacao, titulo = :titulo WHERE codigo_livro = :id";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':ISBN', $this->ISBN);
            $stmt->bindParam(':data_publicacao', $this->data_publicacao);
            $stmt->bindParam(':titulo', $this->titulo);

            return $stmt->execute();
        }

        public function listarCategoria(){
            $sql="SELECT * from categoria";
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

        public function rankingNota(){
            $sql = "select sum(la.qtd_estrelas) as nota, l.titulo, SUBSTRING(l.sinopse from 1 for 100) as sinopse
            from livro_pessoa_avalia as la
            join livro as l on(la.fk_livro_codigo_livro = l.codigo_livro)
            group by l.codigo_livro order by sum(la.qtd_estrelas) desc";
            $stmt = Database::prepare($sql);			
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_BOTH );
        }

        public function avaliarLivro($codigo_livro, $codigo_pessoa,  $nota, $dsc_comentario){
            $sql = "INSERT INTO livro_pessoa_avalia (FK_pessoa_codigo_pessoa, FK_livro_codigo_livro, nota) VALUES (:codigo_livro,:codigo_pessoa,:nota); INSERT INTO comentario (:dsc_comentario)";
			$stmt = Database::prepare($sql);	
			$stmt->bindParam(':codigo_livro', $codigo_livro);
            $stmt->bindParam(':codigo_pessoa', $codigo_pessoa);
            $stmt->bindParam(':nota', $nota);
            $stmt->bindParam(':dsc_comentario', $dsc_comentario);
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_BOTH );
        }

    }
?>
