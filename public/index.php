<?php
require_once __DIR__ . '/../core/database.php';
require_once __DIR__. '/../core/Router.php';


try {
    $db = new PDO('sqlite:' . __DIR__ . '/../core/database.sqlite');
    $statement = $db->query("SELECT sqlite_version()");
    $version = $statement->fetch();
    $router = new Router($db);

} catch (PDOException $e) {
    echo "Error al conectar con SQLite: " . $e->getMessage();
}


$router->add('/', 'HomeController', 'mostrarDashboard');


$router->add('/estudiante/agregar', 'EstudianteController', 'agregar');
$router->add('/estudiante/listar', 'EstudianteController', 'listar');
$router->add('/estudiante/editar', 'EstudianteController', 'editar');
$router->add('/estudiante/eliminar', 'EstudianteController', 'eliminar');

$router->add('/instructor/agregar', 'InstructorController', 'agregar');
$router->add('/instructor/listar', 'InstructorController', 'listar');
$router->add('/instructor/editar', 'InstructorController', 'editar');
$router->add('/instructor/eliminar', 'InstructorController', 'eliminar');

$router->add('/coordinador/crear', 'CoordinadorController', 'crear');
$router->add('/coordinador/listar', 'CoordinadorController', 'listar');
$router->add('/coordinador/editar', 'CoordinadorController', 'editar');
$router->add('/coordinador/eliminar', 'CoordinadorController', 'eliminar');


$requestedUri = isset($_GET['uri']) ? '/' . ltrim($_GET['uri'], '/') : '/';

$router->dispatch($requestedUri);
