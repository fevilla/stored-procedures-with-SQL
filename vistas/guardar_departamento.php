<?php if (!defined('CONTROLADOR')) exit; ?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title> Guardar departamento </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <LINK REL=StyleSheet HREF="../css/stilos.css" TYPE="text/css" MEDIA=screen>
    </head>
    <body class = "m-5">
        <div class = 'text-center mb-5 pb-5'>
            <h1> Guardar departamento</h1>
        <div>

        <div class = "row mt-5">
        <form method="post" action="guardar_departamento.php" class="col-md-3 mx-auto">
                <div class="row pb-3">
                    <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $departamento->getNombre() ?>" required />
                    </div>
                </div>                                  
                <?php if ($departamento->getId()): ?>
                <input type="hidden" name="departamento_id" value="<?php echo $departamento->getId() ?>" />
                <?php endif; ?>
                <div class="row">
                    <button type="submit" class="btn btn-primary mb-3" value="Guardar">Guardar</button>
                </div>
                <a href="index.php"> Cancelar </a>
            </form>
        </div>
    </body>
</html>