<?php 

class Autentificacion{

 private PDO $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }

    public function crear($nombre, $email, $password){
        $consulta = $this->db->prepare("SELECT * FROM `usuarios` WHERE `email` = :email");
        $consulta->execute([
            ':email' =>$email,
        ]);
     
        if($consulta->rowCount()>= 1){
            return false;
        }
        else {
            $sentencia = $this->db->prepare(
            "INSERT INTO usuarios (nombre, email, password)
             VALUES (?, ?, ?)"
        );

         $sentencia->execute([$nombre, $email, $password]);
         $usuario = $consulta->fetch(PDO::FETCH_ASSOC); 
         return $usuario;
        }

        
    }

    public function login($email, $password){
       
        $consulta = $this->db->prepare(
            "SELECT * FROM usuarios WHERE email = :email LIMIT 1"
        );

        $consulta->execute([
            ':email' => $email
        ]);

        $usuario = $consulta->fetch();

        if($usuario && password_verify($password, $usuario['password'])){
            return $usuario;
        }
        else {
            return false;
        }

        
    }


}

?>