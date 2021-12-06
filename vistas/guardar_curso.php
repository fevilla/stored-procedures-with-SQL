<?php if (!defined('CONTROLADOR')) exit; ?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title> Guardar curso </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <LINK REL=StyleSheet HREF="../css/stilos.css" TYPE="text/css" MEDIA=screen>
    </head>
    <body class = "m-5">
        <div class = 'text-center mb-5 pb-5'>
            <h1> Guardar curso </h1>
        <div>

        <div class = "row mt-5">
            <form method="post" action="guardar_curso.php" class="col-md-3 mx-auto">
                <div class="row pb-3">
                    <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $curso->getNombre() ?>" required />
                    </div>
                </div>
                <div class="row  pb-3">
                    <label for="creditos" class="col-sm-3 col-form-label">Creditos</label>
                    <div class="col-sm-9">
                    <input type="number" class="form-control" name="creditos" id="creditos" value="<?php echo $curso->getCreditos() ?>" required />
                    </div>
                </div>
                <div class="row  pb-3">
                    <label for="depa_id" class="col-sm-3 col-form-label">Depa_id</label>
                    <div class="col-sm-9">
                    <input type="number" class="form-control" name="depa_id" id="depa_id" value="<?php echo $curso->getDepa_id() ?>"  required />
                    </div>
                </div>
                                  
                <?php if ($curso->getId()): ?>
                    <input type="hidden" name="departamento_id" value="<?php echo $curso->getId() ?>" />
                <?php endif; ?>
                <div class="row">
                    <button type="submit" class="btn btn-primary mb-3" value="Guardar">Guardar</button>
                </div>
                <a href="index.php"> Cancelar </a>
            </form>
        </div>
    </body>
</html>