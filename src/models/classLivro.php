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
        

        /*function __construct($isbn, $data_publicacao, $titulo) {
            $this->isbn = $isbn;
            $this->data_publicacao = $data_publicacao;
            $this->titulo = $titulo;
        }*/

        public function insertLivro(){
            $sql="INSERT INTO $this->table (ISBN, data_publicacao, titulo, sinopse) VALUES (:ISBN,:data_publicacao,:titulo, :sinopse)";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':ISBN', $this->ISBN);
            $stmt->bindParam(':data_publicacao', $this->data_publicacao);
            $stmt->bindParam(':titulo', $this->titulo);
            $stmt->bindParam(':sinopse', $this->sinopse);

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
        
        public function insertCategoria(){
            $sql="INSERT INTO categoria (dsc_categoria) VALUES (:dsc_categoria)";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':dsc_categoria', $this->dsc_categoria);

            return $stmt->execute();
        }

        public function insertAutor($nome, $nacionalidade){
            $sql="INSERT INTO autor (nome, nacionalidade) VALUES (:nome, :nacionalidade)";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':nacionalidade', $this->nacionalidade);
            
            return $stmt->execute();
        }
        
        /*public function insert(){
            $sql="INSERT INTO $this->table (ISBN, data_publicacao ,titulo) VALUES (:ISBN,:data_publicacao,:titulo)";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':ISBN', $this->ISBN);
            $stmt->bindParam(':data_publicacao', $this->data_publicacao);
            $stmt->bindParam(':titulo', $this->titulo);

            return $stmt->execute();
        }*/
    }
?>
