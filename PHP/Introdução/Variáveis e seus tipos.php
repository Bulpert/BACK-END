<html>
	<head>
		<meta charset="utf-8" />
		<title>Variáveis</title>
	</head>

	<body>

		<?php

			//string
			$nome = 'Robert Alves';

			//int
			$idade = 29;

			//float
			$peso = 82.5;

			//boolean
			$fumante_sn = true; //(true = 1) ou (false = vazio)

			//... lógica ...//

			$idade = '30';

		?>

		<h1>Ficha cadastral</h1>
		<br/>
		<p>Nome: <?= $nome ?></p>
		<p>Idade: <?= $idade ?></p>
		<p>Peso: <?= $peso ?></p>
		<p>Fumante: <?= $fumante_sn ?></p>
		
	</body>
</html>