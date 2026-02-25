<?php 
session_start();
include_once __DIR__.'/../Models/conexion.php';
include_once __DIR__.'/../Models/Autentificacion.php';

class AuthController{
private PDO $db;
private Autentificacion $modelo;

 public function __construct(){
        $conexion = new Conexion();
        $this->db = $conexion->getConection();
        $this->modelo = new Autentificacion($this->db);
    }


public function showLogin(){
  
require_once __DIR__.'/../Views/login.php';    
}

public function showRegister(){
require_once __DIR__ .'/../Views/register.php'; 
}

public function store(){
    $email= $_POST['email'];
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $confirm = $_POST['password_confirmation'];

    if($password !== $confirm ){
        $error = "Las contraseñas no coinciden";
        require __DIR__.'/../Views/register.php';
        
        return;
    }else if(strlen($password) < 8) {
            $error = "La contraseña debe tener al menos 8 caracteres";
            require __DIR__.'/../Views/register.php';
            return;
            }

     $hash  = password_hash($password, PASSWORD_BCRYPT);
     $usuario = $this->modelo->crear(
          $nombre,
          $email,
          $hash
        );
        if($resultado == false){
          $error = "El email ya está en uso";  
            require __DIR__.'/../Views/register.php';
            return;
        }
    $_SESSION['usuario'] = [
    'id' => $usuario['id'],
    'nombre' => $usuario['nombre'],
    'email' => $usuario['email'],
];
    session_regenerate_id(true);
    header('Location: /');
    exit;

} 

public function login (){
$email = $_POST['email'];
$password = $_POST['password'];

$usuario = $this->modelo->login(
    $email,
    $password
);

if(!$usuario){
    $error = "El usuario o la contraseña son incorrectas";
            require __DIR__.'/../Views/login.php';
            return;//debo continuar con el login
}else{             //lo que sigue es el session start e incluirle el id del usuario
    $_SESSION['usuario'] = [
    'id' => $usuario['id'],
    'nombre' => $usuario['nombre'],
    'email' => $usuario['email'],
];
    session_regenerate_id(true);
    header('Location: /');
    exit;
}          
                    
}

public function logout(){
    session_destroy();
    header('Location: /');
    exit;
}

}