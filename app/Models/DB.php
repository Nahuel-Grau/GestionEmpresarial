<?php 

Class DB {
    private $server;
    private $user;
    private $password;
    private $db;
    private $charset; 

    public function __Construct(){

        $this->server = $_ENV['DB_HOST'];
        $this->user = $_ENV['DB_USERNAME'];
        $this->password= $_ENV['DB_PASSWORD'];
        $this->db = $_ENV['DB_ROOT_PASSWORD'];
        $this->charset = $_ENV['DB_CHARSET'];
    }

    public function connect(){
        try {
            $dbConfig = "mysql:host".$this->server.";dbname=".$this->db. ";charset=".$this->charset;
            $errorConfig = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            $PdoConection = new PDO ($dbConfig, $this->user, $this->password, $errorConfig);
            return $PdoConection;
        } catch (\Throwable $ex) {
            echo "Connection error: ".$ex->getMessage();
        }
    }
}