<?php

require_once __DIR__.'/../Db/db.php';
	require_once __DIR__.'/../Config/config.php';
class usuario{

	//Campos da tabela
	private $db;
	private $cpf;
	private $senha;
	private $nome;
	private $escolaridade;
	private $genero;
	private $nacionalidade;
	private $email;
	private $login;
	private $DataDeNascimento;

	//Getters e Setters

	public function getDataDeNascimento(){
		return $this->DataDeNascimento;
	}

	public function setDataDeNascimento($DataDeNascimento){
		$this->DataDeNascimento = $DataDeNascimento;
		return $this;
	}

	public function getCpf(){
		return $this->cpf;
	}

	public function setCpf($cpf){
		$this->cpf = $cpf;
		return $this;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha = md5($senha);
		return $this;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
		return $this;
	}

	public function getEscolaridade(){
		return $this->escolaridade;
	}

	public function setEscolaridade($escolaridade){
		$this->escolaridade = $escolaridade;
		return $this;
	}

	public function getGenero(){
		return $this->genero;
	}

	public function setGenero($genero){
		$this->genero = $genero;
		return $this;
	}

	public function getNacionalidade(){
		return $this->nacionalidade;
	}

	public function setNacionalidade($nacionalidade){
		$this->nacionalidade = $nacionalidade;
		return $this;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
		return $this;
	}

	public function getLogin(){
		return $this->login;
	}

	public function setLogin($login){
		$this->login = $login;
		return $this;
	}


	//Funções

	public function __construct(){
				
		    $this->db = conectaDb();
	}

	public function listar(){
		$query = "Select * from usuario";
		$stmt = $this->db->query($query);
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function getByEmail(){
		//debug($this);
		$query = "Select * from usuario WHERE Email =:email";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':email', $this->getEmail());
		$stmt->execute();

		return $this->toObject($stmt->fetch(\PDO::FETCH_ASSOC));
	}

	public function getByEmailAndSenha(){
		//debug($this);
		$query = "Select * from usuario WHERE Email =:email AND Senha=:senha";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':email', $this->getEmail());
		$stmt->bindValue(':senha', $this->getSenha());
		$stmt->execute();

		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}

	public function getByLoginAndSenha(){
		//debug($this);
		$query = "Select * from usuario WHERE Login =:login AND Senha=:senha";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':login', $this->getLogin());
		$stmt->bindValue(':senha', $this->getSenha());
		$stmt->execute();

		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}

	public function inserir(){
		$query = "Insert into usuario (CPF, DataDeNascimento, Senha, NomeCompleto, Escolaridade, Genero, Nacionalidade, Email, Login) Values (:cpf, :DataDeNascimento, :Senha, :NomeCompleto, :Escolaridade, :Genero, :Nacionalidade, :Email, :Login)";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':cpf', $this->getCpf());
		$stmt->bindValue(':DataDeNascimento', $this->getDataDeNascimento());
		$stmt->bindValue(':Senha', $this->getSenha());
		$stmt->bindValue(':NomeCompleto', $this->getNome());
		$stmt->bindValue(':Escolaridade', $this->getEscolaridade());
		$stmt->bindValue(':Genero', $this->getGenero());
		$stmt->bindValue(':Nacionalidade', $this->getNacionalidade());
		$stmt->bindValue(':Email', $this->getEmail());
		$stmt->bindValue(':Login', $this->getLogin());
		// $stmt->errorInfo();
		$stmt->execute();
		$arr = $stmt->errorInfo();
		// print_r($arr);
	}

	public function alterar(){
		$query = "Update usuario set CPF=:cpf, Senha=:senha, NomeCompleto=:nomeCompleto, DataDeNascimento =:dataDeNascimento, Escolaridade=:escolaridade, Genero=:genero, Nacionalidade=:nacionalidade Where Email=:email";

		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':cpf', $this->getCpf());
		$stmt->bindValue(':dataDeNascimento', $this->getDataDeNascimento());
		$stmt->bindValue(':senha', $this->getSenha());
		$stmt->bindValue(':nomeCompleto', $this->getNome());
		$stmt->bindValue(':escolaridade', $this->getEscolaridade());
		$stmt->bindValue(':genero', $this->getGenero());
		$stmt->bindValue(':nacionalidade', $this->getNacionalidade());
		$stmt->bindValue(':email', $this->getEmail());
		$stmt->errorInfo();
		$stmt->execute();
		// $arr = $stmt->errorInfo();
		// print_r($arr);
	}

	public function deletar($email){
		$query = "delete from usuario where Email=:email";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':email', $email);
		$stmt->execute();
	}

	public function toObject($array){
		$usuario = new Usuario();
		$usuario->setDataDeNascimento($array['DataDeNascimento']);
		$usuario->setCpf($array['CPF']);
		$usuario->setSenha($array['Senha']);
		$usuario->setNome($array['Nome']);
		$usuario->setEscolaridade($array['Escolaridade']);
		$usuario->setGenero($array['Genero']);
		$usuario->setNacionalidade($array['Nacionalidade']);
		$usuario->setEmail($array['Email']);
		$usuario->setLogin($array['Login']);
		// debug($usuario);
		return $usuario;
	}
}


// $t= new Usuario;

// $t->setEscolaridade("esse");
// $t->setEmail("2");
// $t->setNome("3");
// $t->setNacionalidade("esse");



// $t->inserir();
// $a=$t->getEmail();

/*$t= new Usuario;

$t->setCpf("");



$t->inserir();
$a=$t->getCPF();
echo  "<script>alert($a);</script>";*/