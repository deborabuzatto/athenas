<?php
	require_once 'classConexao.php';
	
	
	abstract class CRUD extends Database{
		
		protected $table;
		protected $id;
		protected $buscar;

		abstract public function insert();
		//abstract public function update($id);
		
		
		public function  find($id){
			$sql = "SELECT * FROM $this->table WHERE codigo_pessoa = :id";
			$stmt = Database::prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_BOTH);
			
		}
		
		public function  findAll(){
			$sql = "SELECT * FROM $this->table ";
			$stmt = Database::prepare($sql);			
			$stmt->execute();
			//retorna um array com os registros da tabela indexado pelo nome da coluna da tabela e por um número
			return $stmt->fetchAll(PDO::FETCH_BOTH );
			
		}

		public function busca($pesquisar){
			$sql="SELECT * FROM $this->table WHERE $this->buscar ILIKE :pesquisar";
			$stmt = Database::prepare($sql);	
			$stmt->bindParam(':pesquisar', $pesquisar);
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_BOTH );
		}
	}
?>