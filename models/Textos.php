<?php

require_once __DIR__.'/../Db/db.php';
	require_once __DIR__.'/../Config/config.php';
class Textos{

	//Campos da tabela
		private $idTexto;
		private $conteudo;
		private $idBase;
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
		//Conteudo
	public function getConteudo(){
		return $this->conteudo;
	}

	public function setConteudo($conteudo){
		$this->conteudo = $conteudo;
		return $this;
	}
		//ID
	public function getIdTexto(){
		return $this->idTexto;
	}

	public function setIdTexto($idTexto){
		$this->idTexto =$idTexto;
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

		public function getTextosByID_Base($id){
			$query = "Select * from textos WHERE ID_Base=:ID_Base";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':ID_Base', $id);
			// $stmt->errorInfo();
			$stmt->execute();
			// $arr = $stmt->errorInfo();
			// debug($arr);
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		}



		public function listar(){
		$query = "Select * from textos";
		$stmt = $this->db->query($query);
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
	

	public function inserir(){
		$query = "Insert into textos (Conteudo,Email,ID_Base) Values (:Conteudo,:Email,:ID_Base)";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':Conteudo', $this->getConteudo());
		$stmt->bindValue(':Email', $this->getEmail());
		$stmt->bindValue(':ID_Base', $this->getIdBase());
		// $stmt->errorInfo();
		$stmt->execute();
		// $arr = $stmt->errorInfo();
		// print_r($arr);
	}
		
	public function alterar(){
		$query = "Update textos set Conteudo=:Conteudo,Email=:Email,ID_Base=:ID_Base Where Id_texto=:Id_texto";

		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':Id_texto', $this->getIdTexto());
		$stmt->bindValue(':Conteudo', $this->getConteudo());
		$stmt->bindValue(':Email', $this->getEmail());
		$stmt->bindValue(':ID_Base', $this->getIdBase());
		$stmt->errorInfo();
		$stmt->execute();
		 $arr = $stmt->errorInfo();
		print_r($arr);
	}

	public function deletar($texto){
		$query = "delete from textos Where Id_texto=:Id_texto";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':Id_texto', $texto);
		$stmt->execute();
	}

	public function toObject($array){
		$texto = new Textos();
		$texto->setIdTexto($array['Id_texto']);
		$texto->setConteudo($array['Conteudo']);
		$texto->setEmail($array['Email']);
		$texto->setIdBase($array['ID_Base']);


		// debug($textos);
		return $texto;
	}
}

// $t= new Textos;
// $t->setIdTexto(3);
// $t->setEmail("essssses");
// $t->setIdBase(2);
// $t->setConteudo("essssssss");
// $r = $t->listar();
// $t->deletar(5);

// debug($t);
// $t->alterar();
// $t->inserir();