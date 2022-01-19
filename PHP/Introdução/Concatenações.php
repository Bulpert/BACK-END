<html>

<head>
    <meta charset="UTF-8">
    <title>Concatenção</title>
</head>

<body>
    <?php
    $nome = 'Bob';
    $cor = 'Preta';
    $idade = 25;
    $atividade_preferida = 'Jogar Futebol';

    //operador .
    echo 'Olá '. $nome . ', vi que sua cor preferida é ' . $cor . ', estou vendo também que você possui '. $idade . ' anos e gosta de '. $atividade_preferida;

    //aspas duplas
    echo '<br/>';

    echo "Olá $nome, vi que sua cor preferida é $cor, estou vendo também que você possui $idade anos e gosta de $atividade_preferida";
    ?>


</body>

</html>