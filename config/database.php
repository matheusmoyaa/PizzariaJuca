<?php

class Database {
    private $host = "localhost";
    private $db_name = "pizzariajucadb";
    private $username = "root";
    private $password = "usbw";
    private $port = 3310;
    public $conn;

    public function getConnection() {

         $this ->conn = null;

         try { 
        

          } catch (Exception $e)  {
            

          }
    
    }
}