<?php
include_once __DIR__.'/../Models/conexion.php';
include_once __DIR__.'/../Models/Product.php';
session_start();
class ProductController{

   
        private PDO $db;
        private Product $modelo;

        public function __construct(){
            $conexion = new Conexion();
            $this->db = $conexion->getConection();
            $this->modelo = new Product($this->db);
        }

        public function index(){
           if(!isset($_SESSION['usuario'])){
            $error = "Para poder ingresar a los productos debes estar logueado";  
            require __DIR__.'/../Views/login.php';
           } else
        
            $products = $this->modelo->todos($_SESSION['usuario']['id']);
            require_once __DIR__.'/../Views/productos.php';    
            return;
        }
        public function store(){
            if(!isset($_SESSION['usuario'])){
            $error = "Para poder crear debes estar logueado";  
             require __DIR__.'/../Views/login.php';
        }else
            
            $this->modelo->crear(
                $_SESSION['usuario']['id'],
                $_POST['nombre'],
                $_POST['precio']
                );

                header("Location: /productos");
                exit;
            }

        public function borrar(){
            if(!isset($_SESSION['usuario'])){
            $error = "Para poder borrar debes estar logueado";  
             require __DIR__.'/../Views/login.php';
        }else
            $this->modelo->borrar($_POST['id']);
        header("location: /productos");
        exit;
        }

         public function modificar(){
            if(!isset($_SESSION['usuario'])){
            $error = "Para poder modificar debes estar logueado";  
             require __DIR__.'/../Views/login.php';
        }else
       $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
       if(!$id){
        die("ID inválido");
       }
       $product = $this->modelo->buscarPorId($id);
       
       require __DIR__. '/../Views/modificarProducto.php';
    }

    public function dashboard (){
         if(!isset($_SESSION['usuario'])){
            $error = "Para poder ingresar al dashboard debes estar logueado";  
             require __DIR__.'/../Views/login.php';
        }else
            
        $totalProduct = $this->modelo->todos($_SESSION['usuario']['id']);
        $totalProduct = count(get_object_vars($total));
        require __DIR__ . '/../Views/dashboard.php';
    }
        
    
}