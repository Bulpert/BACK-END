<html>

<head>
    <meta charset="UTF-8">
    <title>Condicionando Imposto de Renda</title>
</head>

<body>
    <?php
    //void
    

   

    //return (com retorno)
    function calcularIR($salario) {
        $salario = 1000;
        $valorRetornado = '';

        if($salario > 1000) {
            $valorRetornado = 'isento';
        } else {
            $valorRetornado = 'não isento';
        }
        return $valorRetornado;
    }


    echo  calcularIR(5000);

    ?>
</body>

</html>