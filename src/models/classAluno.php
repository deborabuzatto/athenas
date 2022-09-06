<?php
    class Aluno {
        public $nome;
        public $usuario;
        public $email;
        public $data_nasc;
        private $senha;

        function __construct($name, $usuario, $email, $data_nasc, $senha) {
            $this->name = $name;
            $this->usuario = $usuario;
            $this->email = $email;
            $this->data_nasc = $data_nasc;
            $this->senha = $senha;
        }
    }
?>