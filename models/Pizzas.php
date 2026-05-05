<?php

class Pizzas


{
    private $conn;
    private $tabela = "pizzas";
    public $idpizzas;
    public $nome;  

    public $ingredientes;
    
    public $valor;

    public function __construct($conexao)
    {
        $this->conn = $conexao;
    }

    public function getall(){
        $query = "SELECT idpizza, nome, ingredientes, valor FROM " . $this->tabela;
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->execute();
        
        return $stmt;
    }
}



