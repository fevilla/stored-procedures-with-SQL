<?php if (!defined('CONTROLADOR')) exit; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Listar personajes </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <LINK REL=StyleSheet HREF="css/stilos.css" TYPE="text/css" MEDIA=screen>
    </head>
    <body class="m-5">
        <div class = "text-center mb-5  mt-5 pb-5">
            <h1> Cursos </h1>
        <div>
        
        <div class = "col-md-6 mx-auto">
        <p > <a href="guardar_curso.php"> Crear nuevo curso </a> </p>
        <?php if (count($cursos) > 0): ?>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Creditos</th>
                    <th scope="col">depa_id</th>
                    <th scope="col">acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($cursos as $item): ?>
                    <tr>
                    <th scope="row"><?php echo $item['curso_id']; ?></th>
                    <td><?php echo $item['nombre']; ?></td>
                    <td><?php echo $item['creditos']; ?></td>
                    <td><?php echo $item['depa_id']; ?></td>
                    <td>
                        <a href="guardar_curso.php?curso_id=<?php echo $item['curso_id'] ?>"> Editar </a> 
                        <a href="eliminar_curso.php?curso_id=<?php echo $item['curso_id'] ?>"> Eliminar </a>  
                    </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                </table>
        <?php else: ?>
            <div class="text-center">
                 <p> No hay cursos para mostrar </p>
            </div>
        <?php endif; ?> 
        </div>

        
        <div class = "text-center mb-5 mt-5 pb-5">
            <h1> Pre requisitos </h1>
        <div>
        <div class = "col-md-4 mx-auto">
        <p > <a href="guardar_pre_requ.php"> Crear nuevo curso </a> </p>
        <?php if (count($pre_reqs) > 0): ?>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                    <th scope="col">ID Curso</th>
                    <th scope="col">ID Curso pre requisito</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($pre_reqs as $item): ?>
                    <tr>
                    <th scope="row"><?php echo $item['curso_id_1']; ?></th>
                    <td><?php echo $item['curso_id_2']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                </table>
        <?php else: ?>
            <p> No hay pre requisitos para mostrar </p>
        <?php endif; ?> 
        </div>
        
        <div class = "text-center mb-5 mt-5 pb-5">
            <h1>  Departamento </h1>
        <div>
        <div class = "col-md-4 mx-auto">
        <p> <a href="guardar_departamento.php"> Crear nuevo departamento</a> </p>
        <?php if (count($departamentos) > 0): ?>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($departamentos as $item): ?>
                    <tr>
                    <th scope="row"><?php echo $item['depa_id']; ?></th>
                    <td><?php echo $item['nombre']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        <?php else: ?>
                 <p> No hay departamentos para mostrar </p>
       
        <?php endif; ?>
        </div>
     </body>
</html>