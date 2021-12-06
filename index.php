<?php
    
    define('CONTROLADOR', TRUE);
    
    require_once 'modelos/Departamento.php';
    require_once 'modelos/Cursos.php';
    require_once 'modelos/Pre_requ.php';
    $departamentos = Departamento::recuperarTodos();
    $cursos = Curso::recuperarTodos();
    $pre_reqs= Pre_requ::recuperarTodos();
    
    require_once 'vistas/index.php';
    
?>