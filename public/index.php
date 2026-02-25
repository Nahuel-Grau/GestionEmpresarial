<?php



// Traigo las rutas
require_once '../routes/web.php';

// Obtengo la URL
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// Busco la ruta
if (isset($routes[$method][$uri])) {
    $action = $routes[$method][$uri];

    // Si es un closure
    if (is_callable($action)) {
        $action();
    } 
    // Si es Controller@method
    else {
        [$controller, $methodAction] = explode('@', $action);

        require_once "../app/Controllers/$controller.php";
        $instance = new $controller();
        $instance->$methodAction();
    }

} else {
    http_response_code(404);
    echo "404 - Página no encontrada";
}