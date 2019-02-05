<?php

	require_once __DIR__.'/../Db/db.php';
	require_once __DIR__.'/../Config/config.php';
class Respondido{

	//Campos da tabela
		private $idR;
		private $id_texto;
		private $data;
		private $email;

	//Getters e Setters

		public function getIdR(){
		return $this->idR;
	}

	public function setIdR($idR){
		$this->idR = $idR;
	}

	public function getId_texto(){
		return $this->id_texto;
	}

	public function setId_texto($id_texto){
		$this->id_texto = $id_texto;
	}

	public function getData(){
		return $this->data;
	}

	public function setData($data){
		$this->data = $data;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}
		
	//Funções

	public function __construct(){
				
		    $this->db = conectaDb();
	}

	public function listar($id_texto, $IDR){
		$query = "Select count(*) from respondido WHERE Id_texto =:Id_texto and IDR =:IDR";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':IDR', $IDR);
		$stmt->bindValue(':Id_texto', $id_texto);
		$stmt->execute();
		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}

	public function seVotou($Email, $id_texto){
		$query = "Select * from respondido WHERE Email=:Email and Id_texto =:Id_texto";
		$stmt = $this->db->prepare($query);		
		$stmt->bindValue(':Id_texto', $id_texto);
		$stmt->bindValue(':Email', $Email);
		$stmt->execute();
		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}

	public function inserir(){
		$query = "Insert into respondido (IDR,Id_texto,Email,Data) Values (:IDR,:Id_texto,:Email,:Data)";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':IDR', $this->getIdR());
		$stmt->bindValue(':Id_texto', $this->getId_texto());
		$stmt->bindValue(':Email', $this->getEmail());
		$stmt->bindValue(':Data', $this->getData());
		$stmt->errorInfo();
		$stmt->execute();
		$arr = $stmt->errorInfo();
		debug($arr);
	}



	public function toObject($array){
		$respondido = new Respondido();
		$respondido->setData($array['Data']);
		$respondido->setEmail($array['Email']);
		$respondido->setId_texto($array['Id_texto']);
		$respondido->setIdR($array['IDR']);

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