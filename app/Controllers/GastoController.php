<?php
session_start();

include_once __DIR__.'/../Models/conexion.php';
include_once __DIR__.'/../Models/Gasto.php';

Class GastoController{
    private PDO $db;
    private Gasto $modelo;

    public function __construct(){
        $conexion = new Conexion();
        $this->db = $conexion->getConection();
        $this->modelo = new Gasto($this->db);
    }

    public function index(){
        $gastos = $this->modelo->todos($_SESSION['usuario']['id']);
        $total = $this->modelo->sumatoria($_SESSION['usuario']['id']);
        require_once __DIR__.'/../Views/gastos.php';    
        return $gastos;
    }
    
    // public function sumatoria(){
       
    //     $total = $this->modelo->sumatoria($_SESSION['usuario']['id']);
    //     return $total;
    // }

    //revisar cuando empiece con las sesiones
    public function store(){
    
      $this->modelo->crear(
            1,
            $_SESSION['usuario']['id'],
            $_POST['monto'],
            $_POST['descripcion'],
            $fecha = date("Y-m-d H:i:s")
        );

        header("Location: /gastos");
        exit;
    }

    //revisar cuando tenga las configuraciones de usuarios
    public function borrar(){
        $this->modelo->borrar($_POST['id']);
        header("location: /gastos");
        exit;
    }

    //revisar cuando tenga las configuraciones de usuarios
    public function modificar(){
       $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
       if(!$id){
        die("ID inválido");
       }
       $gasto = $this->modelo->buscarPorId($id);
       
       require __DIR__. '/../Views/modificarGasto.php';
    }

    
    //revisar cuando tenga las configuraciones de usuarios
    public function actualizar(){
       $id = $_POST['id'];
       $monto = $_POST['monto'];
       $descripcion =$_POST['descripcion'];
       
       $this->modelo->modificar($id,$monto,$descripcion);

       header("Location: /gastos");
        exit;
    }

    public function dashboard (){
         if(!isset($_SESSION['usuario'])){
            $error = "Para poder ingresar al dashboard debes estar logueado";  
             require __DIR__.'/../Views/login.php';
        }else
            
        $total = $this->modelo->sumatoria($_SESSION['usuario']['id']);

        require __DIR__ . '/../Views/dashboard.php';
    }







}





?>