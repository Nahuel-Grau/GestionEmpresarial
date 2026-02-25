<?php

Class ViewsController{

    public function dashboard(){
        require __DIR__ . '/../Views/dashboard.php';       
    }

    public function inicio(){
        require __DIR__.'/../Views/inicio.php';
    }

    public function gastos(){
        require_once __DIR__.'/../Views/gastos.php';
    }

    public function modificar(){
        require_once __DIR__.'/../Views/modificarGasto.php';
    }
}