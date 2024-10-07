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
$router->post('/API/mantenimiento/guardar', [MantenimientoController::class,'guardarAPI']);
$router->post('/API/mantenimiento/modificar', [MantenimientoController::class,'modificarAPI']);
$router->get('/API/mantenimiento/buscar', [MantenimientoController::class,'buscarAPI']);
$router->post('/API/mantenimiento/eliminar', [MantenimientoController::class,'eliminarAPI']);



// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
