<?php
    
    define('CONTROLADOR', TRUE);
    
    require_once 'modelos/Departamento.php';
    
    $departamento_id = (isset($_REQUEST['depa_id'])) ? $_REQUEST['depa_id'] : null;
    
    if($departamento_id){        
        $departamento = Departamento::buscarPorId($departamento_id);        
    }else{
        $departamento = new Departamento();
    }
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
        $departamento->setNombre($nombre);
        $departamento->guardar();
        header('Location: index.php');
    }else{
        include 'vistas/guardar_departamento.php';
    }
    
?>
