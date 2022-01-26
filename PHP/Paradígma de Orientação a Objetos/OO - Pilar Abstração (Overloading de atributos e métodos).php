<?php

    //modelo
    class Funcionario {
        //atributos
        public $nome = null;
        public $telefone = null;
        public $numFilhos = null;
        public $cargo = null;
        public $salario = null;


        //getters setters(overloading / sobrecarga)
        function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        function __get($atributo) {
            return $this->$atributo;
        }

        /* function setNome($nome) {
            $this->nome = $nome;
        }

        function setNumFilhos($numFilhos) {
            $this->numFilhos = $numFilhos;
        }

        function getNome() {
            return $this->nome;
        }

        function getNumFilhos() {
            return $this->numFilhos;
        } */

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

	// Declarando o Objeto e setando seus respectivos atributos 

    $y = new Funcionario();
    $y->__set('nome', 'Robert');
    $y->__set('numFilhos', 0);
	$y->__set('cargo', 'DEV');
	$y->__set('salario', 1000);


    echo $y->__get('nome') . ' possui ' . $y->__get('numFilhos') . ' filho(s) ' . 'Trabalha de ' . $y->__get('cargo') . ' e salário de R$' . $y->__get('salario');
    


echo '<br />';


