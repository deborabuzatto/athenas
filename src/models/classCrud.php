<?php
	require_once 'classConexao.php';
	
	
	abstract class CRUD extends Database{
		
		protected $table;

		abstract public function insert();
		abstract public function update($id);
		
		
		public function  find($id){
			$sql = "SELECT * FROM $this->table WHERE id = :id";
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
		
		public function delete($id){
			$sql="DELETE FROM $this->table WHERE id = :id";
			$stmt = Database::prepare($sql);	
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			return $stmt->execute();
			
		}
		
	}
?>