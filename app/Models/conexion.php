<?php 

class Conexion {
    private $conexion;

    public function getConection(){
        try{
            $host = getenv('DB_HOST');
            $db = getenv('DB_DATABASE');
            $user =getenv('DB_USERNAME');
            $password =getenv('DB_PASSWORD'); 
            $charset =getenv('DB_CHARSET');
            $port = getenv('DB_PORT');

            $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
            $this->conexion = new PDO($dsn, $user, $password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conexion;
        }catch(PDOException $e){
            throw new Exception("Error de conexion: ". $e->getMessage());
        }
    }
    
}