<?php
    $conn = require_once '../utils/conexao.php';
    class Livro {
        public $titulo;
        public $ISBN;
        public $data_publicacao;
        private $id;

        function __construct($titulo, $ISBN, $data_publicacao, $id) {
            $this->titulo = $titulo;
            $this->ISBN = $ISBN;
            $this->data_publicacao = $data_publicacao;
            $this->id = $id;
        }
        
        function imprimirLivro(){
            $stmt = $this->conn->prepare('SELECT :titulo, :data_publicacao, :ISBN FROM livro where codigo_livro = :id');
            $stmt->bindParam(":usuario", $this->titulo);
            $stmt->bindParam(":data_publicacao", $this->data_publicacao);
            $stmt->bindParam(":ISBN", $this->ISBN);
            $stmt->bindParam(":id", $this->id);
            $stmt->execute();
            $livro = $stmt->fetchAll();
        }

        /*function inserirLivro(){
            $stmt = $conn->prepare('SELECT :titulo, :data_publicacao, :ISBN FROM livro where codigo_livro = :id');
            $stmt->bindParam(":usuario", $this->titulo);
            $stmt->bindParam(":data_publicacao", $this->data_publicacao);
            $stmt->bindParam(":ISBN", $this->ISBN);
            $stmt->bindParam(":id", $this->id);
            $stmt->execute();
            $livro = $stmt->fetchAll();


            $query = 'INSERT INTO '. $this->table . ' SET titulo = :titulo';
		
            //prepare statement
            $stmt = $this->conn->prepare($query);
            //clean data
            $this->titulo = htmlspecialchars(strip_tags($this->titulo));
            
            //binding of parameters
            $stmt->bindParam(':titulo', $this->titulo);
            
            //execute the query
            if($stmt->execute()){
                return true;
                
            }
            
            //print erro if something goes wrong
            printf("Error %s. \n", $stmt->error);
            
            return false;
        }
        */
    }
?>