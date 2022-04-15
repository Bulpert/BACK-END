<?php

// CRUD

class TarefaService {
	
	
	private $conexao;
	private $tarefa;
	
	
//	Construtor do Objeto recebendo a conexao e a tarefa
	public function __construct(Conexao $conexao, Tarefa $tarefa) {
		
		
//		incluindo o método executar aqui para ser chamado junto com a variável conexao "->conectar();", para assim conectar com o banco de dados
		$this->conexao = $conexao->conectar();
		$this->tarefa = $tarefa;
	}
	
	
	public function inserir() { //create
		
//		AQUI É ONDE APLICAMOS A AÇÃO QUE O BANCO DE DADOS EXECUTARÁ 
		
		$query = 'insert into tb_tarefas(tarefa)values(:tarefa)';
		
		
		
//		Encaminhando o atributo do objeto que queremos recuperar "   __get('tarefa')   "
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
		
		
//		EXECUTAR A QUERY
		$stmt->execute();
		
		
	}
	
	
	public function recuperar() { //read
		
//		Aqui iremos recuperar os dados das colunas do banco de dados, não iremos usar o "*" para resgatar todos os dados, iremos resgatar pontualmente as seguintes colunas, id, id_status e tarefa
		
//		Usaremos também o join para colocar o o status da tb_tarefas para o status de tb_status
		$query = '
		
			select
				t.id, s.status, t.tarefa
			from
				tb_tarefas as t 
				left join 
				tb_status as s on (t.id_status = s.id)
		
				';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		
//		O FETCH_OBJ retorna um array de  objetos
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function atualizar() { // update
		
		$query = "update tb_tarefas set tarefa = ? where id = ?";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->tarefa->__get('tarefa'));
		$stmt->bindValue(2, $this->tarefa->__get('id'));
		return $stmt->execute();
		
		
//		FAZENDO NO MÉTODO COM PARAMETROS NOMEADOS
//		$query = "update tb_tarefas set tarefa = :tarefa where id = :id";
//		$stmt = $this->conexao->prepare($query);
//		$stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
//		$stmt->bindValue(':id', $this->tarefa->__get('id'));
//		return $stmt->execute();
		
	}
	
	
	public function remover() { // delete
		
		
		$query = 'delete from tb_tarefas where id= :id';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $this->tarefa->__get('id'));
		$stmt->execute();
	}
	
	
	
	public function marcarRealizada() { // update
		
		
		$query = 'update tb_tarefas set id_status = ? where id = ?';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->tarefa->__get('id_status'));
		$stmt->bindValue(2, $this->tarefa->__get('id'));
		return $stmt->execute();
	}
	
	
	public function recuperarTarefasPendentes() { //read
		
//		Aqui iremos recuperar os dados das colunas do banco de dados, não iremos usar o "*" para resgatar todos os dados, iremos resgatar pontualmente as seguintes colunas, id, id_status e tarefa
		
//		Usaremos também o join para colocar o o status da tb_tarefas para o status de tb_status
		$query = '
		
			select
				t.id, s.status, t.tarefa
			from
				tb_tarefas as t 
				left join 
				tb_status as s on (t.id_status = s.id)
			where 
				t.id_status = :id_status
		
				';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
		
		
		$stmt->execute();
		
//		O FETCH_OBJ retorna um array de  objetos
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	
	
}


?>