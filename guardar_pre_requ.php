<?php
    
    define('CONTROLADOR', TRUE);
    
    require_once 'modelos/Pre_requ.php';
    
    $curso_id_1 = (isset($_REQUEST['curso_id_1'])) ? $_REQUEST['curso_id_1'] : null;
    $curso_id_2 = (isset($_REQUEST['curso_id_2'])) ? $_REQUEST['curso_id_2'] : null;
    
    
    $pre_requ = new Pre_requ();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $curso_id_1 = (isset($_POST['curso_id_1'])) ? $_POST['curso_id_1'] : null;
        $curso_id_2 = (isset($_POST['curso_id_2'])) ? $_POST['curso_id_2'] : null;
        echo "<p>". $curso_id_1. "," .$curso_id_2 ."</p>";
        $pre_requ->setIds($curso_id_1);
        $pre_requ->setIdss($curso_id_2);
        $pre_requ->guardar();
        header('Location: index.php');
    }else{
        include 'vistas/guardar_pre_requ.php';
    }
    
?>