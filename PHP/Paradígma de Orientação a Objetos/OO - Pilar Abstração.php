<?php

    //modelo
    class Funcionario {
        //atributos
        public $nome = 'Bob';
        public $telefone = '11 99999-8888';
        public $numFilhos = 2;

        //métodos
        function resumirCadFunc(){
            /* this, operador de ajuste de contexto */
            return "$this->nome possui $this->numFilhos filhos(s)";
  
        }

        function modificarNumFilhos($numFilhos){
            //afetar um atributo do objeto
            $this->numFilhos = $numFilhos;
            //numFilhos: variavel do objeto que pertence a class
            //$numFilhos: variavel do método recebido por parametro
        }
    }

    $y = new Funcionario();
    echo $y->resumirCadFunc(); //para acessar atributos ou métodos, usamos o "->"
    echo '<br />';
    $y->modificarNumFilhos(3);
    echo $y->resumirCadFunc();
    echo '<hr />';

    $x = new Funcionario();
    echo $x->resumirCadFunc();
    echo '<br />';
    $x->modificarNumFilhos(1);
    echo $x->resumirCadFunc();
?>