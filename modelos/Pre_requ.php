<?php

if (!defined('CONTROLADOR'))
    exit;

require_once 'Conexion.php';

class Pre_requ {
    private $curso_id_1;
    private $curso_id_2;

    const TABLA = 'pre_requ';

    public function __construct($curso_id_1 = null, $curso_id_2 = null )
    {
        $this->curso_id_1 = $curso_id_1;
        $this->curso_id_2 = $curso_id_2;
    }

    public function getId1()
    {
       return $this->curso_id_1;
    }

    public function setIds($curso_id_1)
    {
       $this->curso_id_1 = $curso_id_1;
    }

    public function getId2()
    {
       return $this->curso_id_2;
    }

    public function setIdss($curso_id_2)
    {
       $this->curso_id_2 = $curso_id_2;
    }

    public function guardar()
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('CALL  insertar_pre_reque (:curso_id_1, :curso_id_2)');
        $consulta->bindParam(':curso_id_1', $this->curso_id_1);
        $consulta->bindParam(':curso_id_2', $this->curso_id_2);
        $consulta->execute();
        $conexion = null;  
    }

    public static function buscarPorId($curso_id_1 , $curso_id_2) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT curso_id_1 , curso_id_2 FROM ' . self::TABLA . ' WHERE curso_id_1 = :curso_id_1 AND curso_id_2 = :curso_id_2');
        $consulta->bindParam(':curso_id_1', $curso_id_1);
        $consulta->bindParam(':curso_id_2', $curso_id_2);
        $consulta->execute();
        $registro = $consulta->fetch();
        $conexion = null;
        if ($registro) {
            return new self($registro['curso_id_1'], $registro['curso_id_2']);
        } else {
            return false;
        }
    }


    public static function recuperarTodos() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT curso_id_1 , curso_id_2 FROM ' . self::TABLA . ';');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }

}
