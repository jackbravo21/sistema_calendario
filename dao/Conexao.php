<?php

class Conexao extends PDO{

	private $servidor;
	private $usuario;
	private $senha;
	private $dbname;
	private static $pdo;

public function __construct(){
	
	$this->servidor = "dbsellerdb";
	$this->usuario = "postgres";
	$this->senha = "";
	$this->dbname = "melhorias";
    $this->port = "5432";

}

public function conectar(){
	try{
		if(is_null(self::$pdo)){
			self::$pdo = new PDO("pgsql:host=$this->servidor;port=$this->port;dbname=$this->dbname;user=$this->usuario;password=$this->senha");
		}else{
		return self::$pdo;		
		}
	}
	catch(PDOException $ex){
		return $ex;
	}
}



}

?>