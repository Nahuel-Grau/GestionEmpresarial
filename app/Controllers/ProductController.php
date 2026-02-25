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
            $products = $this->modelo->todos($_SESSION['usuario']['id']);
            require_once __DIR__.'/../Views/productos.php';    
            return;
        }
        public function store(){
            
            $this->modelo->crear(
                $_SESSION['usuario']['id'],
                $_POST['nombre'],
                $_POST['precio']
                );

                header("Location: /productos");
                exit;
            }

        public function borrar(){
            $this->modelo->borrar($_POST['id']);
        header("location: /productos");
        exit;
        }

         public function modificar(){
       $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
       if(!$id){
        die("ID inválido");
       }
       $producto = $this->modelo->buscarPorId($id);
       
       require __DIR__. '/../Views/modificarProducto.php';
    }
        
    
}