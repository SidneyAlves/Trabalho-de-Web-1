<?php

	require_once __DIR__.'/../Db/db.php';
	require_once __DIR__.'/../Config/config.php';
class Base{

	//Campos da tabela
		private $estado;
		private $pergunta;
		private $descricao;
		private $idBase;
		private $privacidade;		
		private $maxAcess;
		private $dataHora;
		private $email;
		private $nomeBase;
		

	//Getters e Setters

		//ID_Base
	public function getIdBase(){
		return $this->idBase;
	}

	public function setIdBase($idBase){
		$this->idBase = $idBase;
		return $this;
	}
		//Nome
	public function getNomeBase(){
		return $this->nomeBase;
	}

	public function setNomeBase($nomeBase){
		$this->nomeBase = $nomeBase;
		return $this;
	}
		//Descricao
	public function getDescricao(){
		return $this->descricao;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
		return $this;
	}
		//Privacidade
	public function getPrivacidade(){
		return $this->privacidade;
	}

	public function setPrivacidade($privacidade){
		$this->privacidade = $privacidade;
		return $this;
	}
		//MaxAcess
	public function getMaxAcess(){
		return $this->maxAcess;
	}

	public function setMaxAcess($maxAcess){
		$this->maxAcess = $maxAcess;
		return $this;
	}
		//Pergunta
	public function getPergunta(){
		return $this->pergunta;
	}

	public function setPergunta($pergunta){
		$this->pergunta = $pergunta;
		return $this;
	}
		//DataHora
	public function getDataHora(){
		return $this->dataHora;
	}

	public function setDataHora($dataHora){
		$this->dataHora = $dataHora;
		return $this;
	}
		//E-mail
	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
		return $this;
	}
		//Estado
	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
		return $this;
	}
	
	//Funções

	public function __construct(){
				
		    $this->db = conectaDb();
	}

	public function listarMinhasBases($Email){
		// debug($Email);
		$query = "Select * from base WHERE Email=:Email";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':Email', $Email);
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	 public function listarBasesPrivadas($Email){
	 	// debug($Email);
		$query = "Select * from base INNER JOIN convida ON convida.ID_Base = base.ID_Base WHERE convida.Email=:Email AND base.Privado=1 AND base.Estado=1";
	 	$stmt = $this->db->prepare($query);
	 	$stmt->bindValue(':Email', $Email);
	 	$stmt->execute();
	 	return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	 }

	public function listarBasesPublicasAtivas(){
		// debug($Email);
		$query = "Select * from base WHERE Privado=0 AND Estado=1";
		$stmt = $this->db->query($query);
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}


	public function getById($id){
		// debug($id);
		$query = "Select * from base WHERE ID_Base=:id";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}

	public function getByNome($NomeDaBase){
		// debug($id);
		$query = "Select * from base WHERE NomeDaBase=:NomeDaBase";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':NomeDaBase', $NomeDaBase);
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}


	public function inserir(){
		$query = "Insert into base (Estado,Pergunta,Descricao,ID_Base,Privado,DataHora,Email,NomeDaBase) Values (:Estado,:Pergunta,:Descricao,:ID_Base,:Privado,:DataHora,:Email,:NomeDaBase)";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':Estado', $this->getEstado());
		$stmt->bindValue(':Pergunta', $this->getPergunta());
		$stmt->bindValue(':Descricao', $this->getDescricao());
		$stmt->bindValue(':ID_Base', $this->getIdBase());
		$stmt->bindValue(':Privado', $this->getPrivacidade());
		// $stmt->bindValue(':MaxAcessos', $this->getMaxAcess());
		$stmt->bindValue(':DataHora', $this->getDataHora());
		$stmt->bindValue(':Email', $this->getEmail());
		$stmt->bindValue(':NomeDaBase', $this->getNomeBase());
		$stmt->errorInfo();
		$stmt->execute();
		return $this->db->lastInsertId(); 
		$arr = $stmt->errorInfo();
		debug($arr);
	}
		
	public function alterar(){
		$query = "Update base set Estado=:Estado,Pergunta=:Pergunta,Descricao=:Descricao,Privado=:Privado,DataHora=:DataHora,Email=:Email,NomeDaBase=:NomeDaBase Where ID_Base=:ID_Base";

		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':Estado', $this->getEstado());
		$stmt->bindValue(':Pergunta', $this->getPergunta());
		$stmt->bindValue(':Descricao', $this->getDescricao());
		$stmt->bindValue(':ID_Base', $this->getIdBase());
		$stmt->bindValue(':Privado', $this->getPrivacidade());
		// $stmt->bindValue(':MaxAcessos', $this->getMaxAcess());
		$stmt->bindValue(':DataHora', $this->getDataHora());
		$stmt->bindValue(':Email', $this->getEmail());
		$stmt->bindValue(':NomeDaBase', $this->getNomeBase());
		// $stmt->errorInfo();
		$stmt->execute();
		// $arr = $stmt->errorInfo();
		// print_r($arr);
	}

	public function deletar($base){
		$query = "delete from base Where ID_Base=:ID_Base";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':ID_Base', $base);
		$stmt->execute();
	}

	public function toObject($array){
		$base = new Base();
		$base->setestado($array['Estado']);
		$base->setPergunta($array['Pergunta']);
		$base->setDescricao($array['Descricao']);
		$base->setIdBase($array['ID_Base']);
		$base->setPrivacidade($array['Privado']);
		// $base->setMaxAcess($array['MaxAcessos']);
		$base->setDataHora($array['DataHora']);
		$base->setEmail($array['Email']);
		// debug($base);
		return $base;
	}
}

// $t= new Base;

// $t->setIdBase(1);
// $t->setEmail("23");
// $t->setNomeBase("32");
// $t->setDescricao("aaaa");
// $r = $t->listar();
// $t->setPrivacidade(0);

// debug($r);

// $t->inserir();