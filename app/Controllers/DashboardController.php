<?php

session_start();

include_once __DIR__.'/../Models/conexion.php';
include_once __DIR__.'/../Models/Gasto.php';
include_once __DIR__.'/../Models/Product.php';


Class DashboardController{

    private PDO $db;
    private Product $product;
    private Gasto $gasto;

    public function __construct(){
        $conexion = new Conexion();
        $this->db = $conexion->getConection();
        $this->product = new Product($this->db);
        $this->gasto = new Gasto($this->db);
    }

      public function dashboard (){
         if(!isset($_SESSION['usuario'])){
            $error = "Para poder ingresar al dashboard debes estar logueado";  
             require __DIR__.'/../Views/login.php';
        }else
        $total = $this->gasto->sumatoria($_SESSION['usuario']['id']);

        $totalProduct = $this->product->todos($_SESSION['usuario']['id']);
        $totalProduct = count($totalProduct);

        require __DIR__ . '/../Views/dashboard.php';
    }
}