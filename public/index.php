<?php 
require_once __DIR__ . '/../includes/app.php';


use Controllers\MantenimientoController;
use MVC\Router;
use Controllers\AppController;
use Controllers\MapaController;


$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [AppController::class,'index']);
//creacion de ruta mapa 
$router->get('/mapa', [MapaController::class, 'index']);

$router->get('/mantenimiento', [MantenimientoController::class, 'index']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
