<html>

<head>
    <meta charset="UTF-8">
    <title>Variáveis Constantes</title>
</head>

<body>
    <?php
        //variaveis constantes, por boas práticas é ideal declarar as variáveis constantes em caixa ALTA
        define('BD_URL', 'endereco_bd_dev');
        define('BD_USUARIO', 'usuario_bd_dev');
        define('BD_SENHA', 'senha_bd_dev');

        //... lógica ... //

        //define('BD_URL', 'endereco_bd_prod'); //não será permitido alterar, já que é uma variável constante  

        echo BD_URL. '<br/>';
        echo BD_USUARIO. '<br/>';
        echo BD_SENHA. '<br/>';
    ?>


</body>

</html>