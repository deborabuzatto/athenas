<?php
    require_once 'classCrud.php';

    class Aluno extends CRUD{
        protected $table = 'pessoa';
        protected $id = 'codigo_pessoa';
        protected $buscar = 'nome';

        private $nome;
        private $usuario;
        private $email;
        private $data_nasc;
        private $senha;

        public function setNome($nome){
            $this->nome = $nome;
        }
        public function getNome(){
            return $this->nome;
        }
        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }
        public function getUsuario(){
            return $this->usuario;
        }
        public function setEmail($email){
            $this->email = $email;
        }
        public function getEmail(){
            return $this->email;
        }
        public function setData_nasc($data_nasc){
            $this->data_nasc = $data_nasc;
        }
        public function getData_nasc(){
            return $this->data_nasc;
        }
        public function setSenha($senha){
            $this->senha = $senha;
        }
        public function getSenha(){
            return $this->senha;
        }
        

        /*function __construct($name, $usuario, $email, $data_nasc, $senha) {
            $this->name = $name;
            $this->usuario = $usuario;
            $this->email = $email;
            $this->data_nasc = $data_nasc;
            $this->senha = $senha;
        }*/

        public function login() {
            $sql = "SELECT * FROM pessoa WHERE email = :email and senha = :senha";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":senha", $this->senha);
            $stmt->execute();

            return $stmt->fetch();
        }

        public function insert(){
            $sql="INSERT INTO $this->table (nome, username ,email,data_nasc,senha) VALUES (:nome,:usuario,:email,:data_nasc,:senha)";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':usuario', $this->usuario);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':data_nasc', $this->data_nasc);
            $stmt->bindParam(':senha', $this->senha);

            return $stmt->execute();
        }
        
        public function update($id){
            $sql="UPDATE $this->table SET nome = :nome, usuario = :usuario, email = :email , data_nasc = :data_nasc WHERE codigo_pessoa = :id ";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':sobrenome', $this->sobrenome);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':data_nasc', $this->data_nasc, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            return $stmt->execute();
        }

    }
?>
