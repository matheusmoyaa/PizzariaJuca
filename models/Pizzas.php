<?php

class Pizzas


{
    private $conn;
    private $tabela = "Pizzas";
    public $idPizzas;
    public $nome;  

    public $ingredientes;
    
    public $valor;

    public function __construct($conexao)
    {
        $this->conn = $conexao;
    }

    public function getall(){
        $query = "SELECT idPizzas, nome, ingredientes, valor FROM " . $this->tabela;
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->execute();
        
        return $stmt;
    }
    public function get (){
        $query = 'SELECT 
         idPizzas,
         nome,
         ingredientes,
         valor
        FROM ' . $this->tabela . ' 
        WHERE 
            idPizzas = ? 
        LIMIT 1';
    
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(1, $this->idPizzas);
        $stmt->bindParam(2, $this->nome);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $this->nome = $row['nome'];
        $this->ingredientes = $row['ingredientes'];
        $this->valor = $row['valor'];
    }






}



