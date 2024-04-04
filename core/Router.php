<?php

class Router {
    private $routes = [];
    private $db;
    public function __construct($db) {
        $this->db = $db;
    }

    public function add($uri, $controller, $method) {
        $this->routes[$uri] = ['controller' => $controller, 'method' => $method];
    }

    public function dispatch($requestedUri) { // Añade $db como argumento aquí si es necesario
        if (array_key_exists($requestedUri, $this->routes)) {
            $controller = $this->routes[$requestedUri]['controller'];
            $method = $this->routes[$requestedUri]['method'];

            require_once __DIR__ . "/../app/controllers/$controller.php";
            $controllerObj = new $controller($this->db); // Modifica esta línea para pasar $db
            $controllerObj->$method();
        } else {
            echo "404 Not Found";
        }
    }

}
