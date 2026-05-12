<?php
 
class Bebidas
{
    private $conn;
    private $tabela = "bebidas";
    public $idBebidas;
    public $nome;
    public $tipo;
    public $valor;
 
    public function __construct($conexao)
    {
        $this->conn = $conexao;
    }
    public function getall()
    {
        $query = "SELECT IdBebidas, nome, tipo, valor FROM " . $this->tabela;
 
        $stmt = $this->conn->prepare($query);
 
        $stmt->execute();
 
        return $stmt;
    }
 
    public function get()
    {
        $query = 'SELECT
          idBebidas,
          nome,
          tipo,
          valor
        FROM
           ' . $this->tabela . '
        WHERE
          idBebidas = ?
        LIMIT 1';
 
        $stmt = $this->conn->prepare($query);
 
        $stmt->bindParam(1, $this->idBebidas);
 
        $stmt->execute();
 
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->nome = $row['nome'];
        $this->tipo = $row['tipo'];
        $this->valor = $row['valor'];
       
    }
}
 
?>