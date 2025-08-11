<?php
// Configuración de la conexión a la base de datos
class Database{
    private $host = "localhost";
    private $db_name = "clinica_db";
    private $username = "root";
    private $password ="sistemas";
    public $conn;

    // Método para obtener la conexión a la base de datos
    public function getConection(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host". $this->host. "; dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(\Throwable $th){
            echo "Error de la conexión: " . $th->getMessage();
        }

        // Retorna la conexión
        return $this->conn;
    }

}

