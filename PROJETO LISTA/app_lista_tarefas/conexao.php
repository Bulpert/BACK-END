<?php


class conexao {
	
	private $host = 'localhost';
	
	// Nome do Banco de dados
	private $dbname = 'php_com_pdo';
	
	// Usuário do Servidor
	private $user = 'root';
	
	// Senha do Servidor
	private $pass = '';
	
	
	public function conectar() {
		
		try {
			
			$conexao = new PDO(
//				Definir qual banco de dados estamos utilizando, nesse caso o Mysql
				"mysql:host=$this->host;dbname=$this->dbname",
				"$this->user",
				"$this->pass",
				array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
				
			);
			
			return $conexao;
			
		} catch (PDOException $e) {
			
//			Mostrando a mensagem de erro
			echo '<p>' .$e->getMessage(). '</p>';
		}
	}
	
}


?>