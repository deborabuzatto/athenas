<?php
    class Livro {
        public $titulo;
        public $ISBN;
        public $data_publicacao;

        function __construct($titulo, $ISBN, $data_publicacao) {
            $this->titulo = $titulo;
            $this->ISBN = $ISBN;
            $this->data_publicacao = $data_publicacao;
        }
        
        function get_titulo() {
            return $this->titulo;
        }

        function get_ISBN() {
            return $this->ISBN;
        }
        
        function get_data_publicacao() {
            return $this->data_publicacao;
        }

    }
?>