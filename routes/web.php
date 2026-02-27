<?php
$routes = [];

// GET
$routes['GET']['/login'] = 'AuthController@showLogin';
$routes['GET']['/register'] = 'AuthController@showRegister';
$routes['GET']['/dashboard'] = 'DashboardController@dashboard';
$routes['GET']['/'] ='ViewsController@inicio';
$routes['GET']['/productos']= 'ProductController@index';
$routes['GET']['/gastos'] ='GastoController@index';
$routes['GET']['/gastos/modificar'] = 'GastoController@modificar';
$routes['GET']['/logout']= 'AuthController@logout';
$routes['GET']['/productos/modificar']='ProductController@modificar';

// POST
$routes['POST']['/login'] = 'AuthController@login';
$routes['POST']['/gastos'] = 'GastoController@store';
$routes['POST']['/gastos/borrar']= 'GastoController@borrar';
$routes['POST']['/gastos/actualizar']= 'GastoController@actualizar';
$routes['POST']['/register']= 'AuthController@store';
$routes['POST']['/productos']='ProductController@store';
$routes['POST']['/productos/borrar']= 'ProductController@borrar';



// Ruta con closure (opcional)
$routes['GET']['/hola'] = function () {
    echo "Hola mundo";
};
