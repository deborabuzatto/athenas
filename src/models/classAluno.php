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
        private $username;
        private $url_img;

        public function setNome($nome){
            $this->nome = $nome;
        }
        public function getNome(){
            return $this->nome;
        }
        public function setUsername($username){
            $this->username = $username;
        }
        public function getUsername(){
            return $this->username;
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
        public function setUrl_img($url_img){
            $this->url_img = $url_img;
        }
        public function getUrl_img(){
            return $this->url_img;
        }

        public function login() {
            $sql = "SELECT * FROM pessoa WHERE email = :email and senha = :senha";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":senha", $this->senha);
            $stmt->execute();

            return $stmt->fetch();
        }

        public function insert(){
            $sql="INSERT INTO $this->table (nome, username ,email,data_nasc,senha) VALUES (:nome,:username,:email,:data_nasc,:senha)";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':data_nasc', $this->data_nasc);
            $stmt->bindParam(':senha', $this->senha);

            return $stmt->execute();
        }
        
        public function update($id){
            $sql="UPDATE pessoa SET nome = :nome, username = :username, data_nasc = :data_nasc, email = :email  WHERE codigo_pessoa = :id ";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':data_nasc', $this->data_nasc);
            $stmt->bindParam(':id', $id);

            return $stmt->execute();
        }

        public function update_perfil($id){
            $sql="UPDATE pessoa SET username = :username, email = :email, img_perfil = :imagem WHERE codigo_pessoa = :id";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':imagem', $this->url_img);
            $stmt->bindParam(':id', $id);

            return $stmt->execute();
        }

        public function excluir($id){

            $sql2="SELECT * FROM livro_pessoa_avalia WHERE fk_pessoa_codigo_pessoa = :id";
			$stmt2 = Database::prepare($sql2);	
			$stmt2->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt2->execute();
            $dados = $stmt2->fetch();

            $sql3="SELECT * FROM livro_pessoa_loca WHERE fk_pessoa_codigo_pessoa = :id";
			$stmt3 = Database::prepare($sql3);	
			$stmt3->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt3->execute();
            $dados1 = $stmt3->fetch();
            if($dados1['fk_pessoa_codigo_pessoa']){
                $sql4="DELETE FROM livro_pessoa_loca WHERE fk_pessoa_codigo_pessoa = :id";
                $stmt4 = Database::prepare($sql4);	
                $stmt4->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt4->execute();
            }

            if($dados['fk_pessoa_codigo_pessoa']){
                $sql1="DELETE FROM livro_pessoa_avalia WHERE fk_pessoa_codigo_pessoa = :id";
                $stmt1 = Database::prepare($sql1);	
                $stmt1->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt1->execute();
            }

			$sql="DELETE FROM pessoa WHERE codigo_pessoa = :id";
			$stmt = Database::prepare($sql);	
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			return $stmt->execute();
            
		}

        public function salvar_img($id){
            $sql="UPDATE pessoa SET img_perfil = :imagem WHERE codigo_empresa = :id";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':imagem', $this->url_img);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_BOTH);
        }
    }
?>
