<?php
//	é necessário fazer o require aqui para apontar para o resto da lógica, onde é a parte confidencial do código, por isso preciso fazer fora de um diretório publico
	require '../../app_lista_tarefas/tarefa.model.php';
	require '../../app_lista_tarefas/tarefa.service.php';
	require '../../app_lista_tarefas/conexao.php';


	

	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

	

//	Usamos o isset para ver se o valor está setado
	if($acao == 'inserir') {

	
		$tarefa = new Tarefa();

	//	Setando a tarefa e atribuindo o valor recebido via post
		$tarefa->__set('tarefa', $_POST['tarefa']);

	//	criando a instancia de conexão com o bd
		$conexao = new Conexao();


	//	Objeto tarefa service que vai recuperar o objeto e a conexao para realização das operações juntos ao bd
		$tarefaService = new  TarefaService($conexao, $tarefa);


	// 	Inserindo a tarefa (lógica está na função public inserir)
		$tarefaService->inserir();

	//	Caso grave com sucesso, redirecionar para a página mencionada abaixo:
		
		
		header('Location: nova_tarefa.php?inclusao=1');

		
	} else if($acao == 'recuperar') {
		
		$tarefa = new Tarefa();
		$conexao = new Conexao();
		
		$tarefaService = new TarefaService($conexao, $tarefa);
		
		// Apontado para o Objeto/public function recuperar
		$tarefas = $tarefaService->recuperar();
		
		
	} else if ($acao == 'atualizar') {
		
//		REGRA DE NEGÓCIO
		$tarefa = new Tarefa();
		$tarefa->__set('id', $_POST['id'])->__set('tarefa', $_POST['tarefa']);
		
		
		$conexao = new Conexao();
		
		$tarefaService = new TarefaService($conexao, $tarefa);
		
		
//		Se retornar 1 é pq deu certo
//		echo $tarefaService->atualizar();
		
		// verificando se é verdadeiro (1) ou falso(0)
		if($tarefaService->atualizar()) {
		
			if(isset($_GET['pag']) && $_GET['pag'] == 'index') {

				header('Location: index.php');

			} else {

				header('Location: todas_tarefas.php');
			}
		
		}
		
	} else if ($acao == 'remover') {
		
		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id']);
		
		$conexao = new Conexao();
		
		$tarefaService = new TarefaService($conexao, $tarefa);
		
		$tarefaService->remover();
		
//		Para dar um reloading na page
		if(isset($_GET['pag']) && $_GET['pag'] == 'index') {
			
			header('Location: index.php');
			
		} else {
			
			header('Location: todas_tarefas.php');
		}
		
		
	} else if ($acao == 'marcarRealizada') {
		
		
		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id'])->__set('id_status',2);
		
		$conexao = new Conexao();
		
		$tarefaService = new TarefaService($conexao, $tarefa);
		
		$tarefaService->marcarRealizada();
		
//		Para dar um reloading na page
		if(isset($_GET['pag']) && $_GET['pag'] == 'index') {
			
			header('Location: index.php');
			
		} else {
			
			header('Location: todas_tarefas.php');
		}
		
		
	} else if($acao == 'recuperarTarefasPendentes') {
		
		
		$tarefa = new Tarefa();
		$tarefa->__set('id_status', 1);
		
		$conexao = new Conexao();
		
		$tarefaService = new TarefaService($conexao, $tarefa);
		
		// Apontado para o Objeto/public function recuperar
		$tarefas = $tarefaService->recuperarTarefasPendentes();
	}
?>



