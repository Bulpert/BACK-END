<?php
	
//	Aqui iremos declarar a variável ação e atribuir o valor dela, como estamos usando o require, a variável ficará disponível nos lugares requisitados também.
	$acao = 'recuperar';

	require 'tarefa_controller_public.php';
	

//	Usamos isso para ver as informações que o php nos retorna em arrays
//	echo '<pre>';
//		print_r($tarefas);
//	echo '</pre>';
?>


<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		
		
		
		<script>
		
			function editar(id, txt_tarefa) {
				

				let form = document.createElement('form')
				form.action = 'tarefa_controller_public.php?acao=atualizar'
				form.method = 'post'
				form.className = 'row'
				
				
				
				let inputTarefa = document.createElement('input')
				inputTarefa.type = 'text'
				inputTarefa.name = 'tarefa'
				inputTarefa.className = 'col-9 form-control'
				inputTarefa.value = txt_tarefa
				
				
//				Criando um input hidden para guardar o id da tarefa
				let inputId = document.createElement('input')
				inputId.type = 'hidden'
				inputId.name = 'id'
				inputId.value = id
				
				
				
				
				
				let button = document.createElement('button')
				button.type = 'submit'
				button.className = 'col-3 btn btn-info'
				button.innerHTML = 'Atualizar'
				
				
//				Construindo a árvore de elementos
				
				
//				incluindo inputTarefa no form
				form.appendChild(inputTarefa)
				
				
//				incluindo button no form
				form.appendChild(inputId)
				
				
//				incluindo button no form
				form.appendChild(button)
				
				// Selecionando a div tarefa
				let tarefa = document.getElementById('tarefa_'+id)
				
				
				//limpar o conteúdo
				
				
				tarefa.innerHTML = ''
				
				
				// incluir form na página, com o método insetBefore que permite que um elemento seja inserido sobre um elemento ja renderizado
				tarefa.insertBefore(form, tarefa[0])
				
				
				
				
			}
			
			
			
//			REMOVER
			
			function remover(id) {
				
//				forçando o request para o mesmo local
				location.href = 'todas_tarefas.php?acao=remover&id='+id
			}
			
			
			
			
//			REMOVER
			
			function marcarRealizada(id) {
				
//				forçando o request para o mesmo local
				location.href = 'todas_tarefas.php?acao=marcarRealizada&id='+id
			}
		
		</script>
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item active"><a href="#">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Todas tarefas</h4>
								<hr />

								
								<!--AQUI IREMOS INCLUIR AS INFORMAÇÕES CONTIDAS NO BANCO DE DADOS DE MANEIRA DINâMICA ATRAVÉS DO FOREACH

								a variável que estou declarando como "indice" serve para resgatar a posição do conteudo no bd, poderiamos usar qualquer outro nome, key, id .. etc


								Utilizaremos a tag simples de IMPRESSÃO do php: < ?= ?>
--> 
								
								
								
								<? foreach($tarefas as $indice =>$tarefa) { ?>
								
								<div class="row mb-3 d-flex align-items-center tarefa">
									<div class="col-sm-9" id="tarefa_<?= $tarefa->id ?>">
										<?= $tarefa->tarefa ?> (<?= $tarefa->status ?>)
									</div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
										
										<? if($tarefa->status == 'pendente') { ?>	
											
<!--										Aqui iremos aplicar a function remover (lixeira)-->
											
											<i class="fas fa-trash-alt fa-lg text-danger" onClick="remover(<?= $tarefa->id ?>)"></i>
											
<!--										Aqui iremos colocar o id dinâmico retornado pelo php dentro da function do js-->
											<i class="fas fa-edit fa-lg text-info" onClick="editar(<?= $tarefa->id ?>, '<?= $tarefa->tarefa ?>')"></i>
											<? } ?>
											
											
<!--										Aqui iremos a function para marcar os itens-->
											<i class="fas fa-check-square fa-lg text-success" onClick="marcarRealizada(<?= $tarefa->id ?>)"></i>
										</div>
								</div>
								
	
							<?	} ?>
							
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>