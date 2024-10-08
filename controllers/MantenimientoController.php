<?php

namespace Controllers;

use Exception;
use Model\Mantenimiento;
use MVC\Router;

class MantenimientoController {
    
    public static function index(Router $router){
        $router->render('mantenimiento/index',[]);
    }

    public static function find(Router $router)
    {
        $mantenimientos = Mantenimiento::obtenerMantenimientos();
        $router->render('mantenimiento/index', [
            'mantenimiento' => $mantenimientos
        ]);
    }

    public static function guardarAPI()
    {
        $_POST['nombre_dep'] = htmlspecialchars($_POST['nombre_dep']);
        $_POST['num_op'] = filter_var($_POST['num_op'], FILTER_SANITIZE_NUMBER_INT);
        $_POST['num_compu'] = filter_var($_POST['num_compu'], FILTER_SANITIZE_NUMBER_INT);
        $_POST['num_antivirus'] = filter_var($_POST['num_antivirus'], FILTER_SANITIZE_NUMBER_INT);

        try {
            $mantenimiento = new Mantenimiento($_POST);
            $resultado = $mantenimiento->crear();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Mantenimiento guardado exitosamente',
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al guardar mantenimiento',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function buscarAPI()
    {
        try {
            $mantenimientos = Mantenimiento::obtenerMantenimientos();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Datos encontrados',
                'datos' => $mantenimientos
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al buscar mantenimientos',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function modificarAPI()
    {
        $_POST['nombre_dep'] = htmlspecialchars($_POST['nombre_dep']);
        $_POST['num_op'] = filter_var($_POST['num_op'], FILTER_SANITIZE_NUMBER_INT);
        $_POST['num_compu'] = filter_var($_POST['num_compu'], FILTER_SANITIZE_NUMBER_INT);
        $_POST['num_antivirus'] = filter_var($_POST['num_antivirus'], FILTER_SANITIZE_NUMBER_INT);
        $id = filter_var($_POST['id_mant'], FILTER_SANITIZE_NUMBER_INT);

        try {
            $mantenimiento = Mantenimiento::find($id);
            if (!$mantenimiento) {
                throw new Exception("Mantenimiento no encontrado");
            }
            $mantenimiento->sincronizar($_POST);
            $mantenimiento->actualizar();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Mantenimiento modificado exitosamente',
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al modificar mantenimiento',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function eliminarAPI()
    {
        $id = filter_var($_POST['id_mant'], FILTER_SANITIZE_NUMBER_INT);
        try {
            $mantenimiento = Mantenimiento::find($id);
            if (!$mantenimiento) {
                throw new Exception("Mantenimiento no encontrado");
            }
            $mantenimiento->sincronizar(['mant_situacion' => 0]);
            $mantenimiento->actualizar();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Mantenimiento eliminado exitosamente',
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al eliminar mantenimiento',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function obtenerDatosMapaAPI() {
        $mantenimientos = Mantenimiento::obtenerMantenimientosConDependencias();
        echo json_encode($mantenimientos); // Enviar los datos como JSON al frontend
    }
}
