<?php


require_once __DIR__.'/../Db/db.php';
	require_once __DIR__.'/../Config/config.php';
class Convida{

	//Campos da tabela
		private $email;
		private $idBase;
	//Getters e Setters

			//ID_Base
	public function getIdBase(){
		return $this->idBase;
	}

	public function setIdBase($idBase){
		$this->idBase = $idBase;
		return $this;
	}

	
		//Email
	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email =$email;
		return $this;
	}
		
	//Funções

	public function __construct(){
				
		    $this->db = conectaDb();
	}


		public function getEmailByID_Base($id){
			$query = "Select Email from convida WHERE ID_Base=:ID_Base";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':ID_Base', $id);
			// $stmt->errorInfo();
			$stmt->execute();
			// $arr = $stmt->errorInfo();
			// debug($arr);
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		}

		public function getID_BaseByEmail($Email){
			$query = "Select ID_Base from convida WHERE Email=:Email";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':Email', $Email);
			// $stmt->errorInfo();
			$stmt->execute();
			// $arr = $stmt->errorInfo();
			// debug($arr);
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		}

		public function listar(){
		$query = "Select * from convida";
		$stmt = $this->db->query($query);
		// $stmt->bindValue(':base', $this->getIdBase());
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
	

	public function inserir(){
		$query = "Insert into convida (Email,ID_Base) Values (:Email,:ID_Base)";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':Email', $this->getEmail());
		$stmt->bindValue(':ID_Base', $this->getIdBase());
		$stmt->errorInfo();
		$stmt->execute();
		$arr = $stmt->errorInfo();
		debug($arr);
	}
		

	public function deletar($ID_Base,$Email){
		$query = "delete from convida Where ID_Base=:ID_Base AND Email=:Email";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':ID_Base', $ID_Base);
		$stmt->bindValue(':Email', $Email);
		$stmt->execute();
	}

}

// $t= new Respostas;

// $t->setConteudo("esssse");
// $t->setIdBase("1");
// $t->setEmail("sdasssssdasd");
// $t->setIdR(6);
//$t->setConteudo("esse");


// debug($t);
// $r = $t->listar();

// debug($r);