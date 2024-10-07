<?php

namespace Model;

class Dependencia extends ActiveRecord
{
    protected static $tabla = 'dependencias'; // Nombre de la tabla en la base de datos
    protected static $idTabla = 'id_dep'; // Clave primaria de la tabla
    protected static $columnasDB = ['id_dep', 'nombre_dep', 'latitud', 'longitud', 'icono'];

    public $id_dep;
    public $nombre_dep;
    public $latitud;
    public $longitud;
    public $icono;

    public function __construct($args = [])
    {
        $this->id_dep = $args['id_dep'] ?? null;
        $this->nombre_dep = $args['nombre_dep'] ?? '';
        $this->latitud = $args['latitud'] ?? '';
        $this->longitud = $args['longitud'] ?? '';
        $this->icono = $args['icono'] ?? '';
    }

    // Método para obtener todas las dependencias
     // Obtener todas las habitaciones
     public static function all() {
        $query = "SELECT * FROM " . static::$tabla . " WHERE dep_situacion = 1";
        return self::fetchArray($query);
    }

    public static function buscar()
    {
        $sql = "SELECT * FROM dependencias where dep_situacion = 1";
        return self::fetchArray($sql);
    }
}
