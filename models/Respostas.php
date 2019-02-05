<?php


require_once __DIR__.'/../Db/db.php';
	require_once __DIR__.'/../Config/config.php';
class Respostas{

	//Campos da tabela
		private $idR;
		private $conteudo;
		private $idBase;
		private $data;
		private $email;

	//Getters e Setters

		//ID_Base
	public function getIdBase(){
		return $this->idBase;
	}

	public function setIdBase($idBase){
		$this->idBase = $idBase;
		return $this;
	}
		//Data
	public function getData(){
		return $this->data;
	}

	public function setData($data){
		$this->data = $data;
		return $this;
	}
		//Conteudo
	public function getConteudo(){
		return $this->conteudo;
	}

	public function setConteudo($conteudo){
		$this->conteudo = $conteudo;
		return $this;
	}
		//ID
	public function getIdR(){
		return $this->idR;
	}

	public function setIdR($idR){
		$this->idR =$idR;
		return $this;
	}
	
		//Email
	// public function getEmail(){
	// 	return $this->email;
	// }

	// public function setEmail($email){
	// 	$this->email =$email;
	// 	return $this;
	// }
		
	//Funções

	public function __construct(){
				
		    $this->db = conectaDb();
	}


		public function getRespostasByID_Base($id){
			$query = "Select * from classerespostas WHERE ID_Base=:ID_Base";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':ID_Base', $id);
			// $stmt->errorInfo();
			$stmt->execute();
			// $arr = $stmt->errorInfo();
			// debug($arr);
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		}

		public function listar(){
		$query = "Select * from classerespostas";
		$stmt = $this->db->query($query);
		// $stmt->bindValue(':base', $this->getIdBase());
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
	

	public function inserir(){
		$query = "Insert into classerespostas (IDR,conteudo,ID_Base,Data) Values (:IDR,:conteudo,:ID_Base,:Data)";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':IDR', $this->getIdR());
		$stmt->bindValue(':conteudo', $this->getConteudo());
		// $stmt->bindValue(':Email', $this->getEmail());
		$stmt->bindValue(':ID_Base', $this->getIdBase());
		$stmt->bindValue(':Data', $this->getData());
		$stmt->errorInfo();
		$stmt->execute();
		$arr = $stmt->errorInfo();
		debug($arr);
	}
		
	public function alterar(){
		$query = "Update classerespostas set conteudo=:conteudo,ID_Base=:ID_Base,Data=:Data Where IDR=:IDR";

		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':IDR', $this->getIdR());
		$stmt->bindValue(':conteudo', $this->getConteudo());
		// $stmt->bindValue(':Email', $this->getEmail());
		$stmt->bindValue(':ID_Base', $this->getIdBase());
		$stmt->bindValue(':Data', $this->getData());
		$stmt->errorInfo();
		$stmt->execute();
		// $arr = $stmt->errorInfo();
		// print_r($arr);
	}

	public function deletar($respostas){
		$query = "delete from classerespostas Where IDR=:IDR";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':IDR', $respostas);
		$stmt->execute();
	}

	public function toObject($array){
		$respostas = new Respostas();
		$respostas->setIdR($array['IDR']);
		$respostas->setConteudo($array['conteudo']);
		$respostas->setIdBase($array['ID_Base']);
		$respostas->setData($array['Data']);

		// debug($respostas);
		return $respostas;
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