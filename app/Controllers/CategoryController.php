<?php
session_start();

include_once __DIR__.'/../Models/Category.php';
include_once __DIR__.'/../Models/conexion.php';


Class CategoryController{
    private PDO $db;
    private Category $category;

    public function __construct(){
        $conexion = new Conexion();
        $this->db = $conexion->getConection();
        $this->modelo = new Category($this->db);
    }

    public function index(){
        if(!isset($_SESSION['usuario'])){
            $error = "para poder ingresar debes estar logueado";  
             require __DIR__.'/../Views/login.php';
        }else
        $category = 0;
        require_once __DIR__.'/../Views/categorias.php';    
        return;
    }
}