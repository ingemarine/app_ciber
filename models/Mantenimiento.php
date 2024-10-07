<?php

namespace Model;

class Mantenimiento extends ActiveRecord
{
    protected static $tabla = 'mantenimientos';
    protected static $idTabla = 'id_mant';
    protected static $columnasDB = ['nombre_dep', 'num_op', 'num_compu', 'num_antivirus', 'mant_situacion'];

    public $id_mant;
    public $nombre_dep;
    public $num_op;
    public $num_compu;
    public $num_antivirus;
    public $mant_situacion;

    public function __construct($args = [])
    {
        $this->id_mant = $args['id_mant'] ?? null;
        $this->nombre_dep = $args['nombre_dep'] ?? '';
        $this->num_op = $args['num_op'] ?? 0;
        $this->num_compu = $args['num_compu'] ?? 0;
        $this->num_antivirus = $args['num_antivirus'] ?? 0;
        $this->mant_situacion = $args['mant_situacion'] ?? 1;
    }

    public static function obtenerMantenimientos()
    {
        $sql = "SELECT * FROM mantenimientos WHERE mant_situacion = 1";
        return self::fetchArray($sql);
    }

    public static function buscarPorDependencia($nombre_dep)
    {
        $sql = "SELECT * FROM mantenimientos WHERE nombre_dep = $nombre_dep AND mant_situacion = 1";
        return self::fetchArray($sql);
    }
}
