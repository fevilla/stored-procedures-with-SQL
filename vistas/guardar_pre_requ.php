<?php if (!defined('CONTROLADOR')) exit; ?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title> Guardar relacion pre_requisito </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <LINK REL=StyleSheet HREF="../css/stilos.css" TYPE="text/css" MEDIA=screen>
    </head>
    <body class="m-5">
        <div class = 'text-center mb-5 pb-5'>
            <h1> Guardar relación pre requisito </h1>
        <div>
        <div class = "row mt-5">
        <form method="post" action="guardar_pre_requ.php" class="col-md-3 mx-auto">
                <div class="row pb-3">
                    <label for="curso_id_1" class="col-sm-8 col-form-label">ID curso</label>
                    <div class="col-sm-4">
                      <input type="number" class="form-control" name="curso_id_1" id="curso_id_1" value="<?php echo $pre_requ->getId1() ?>" required />
                    </div>
                </div>
                <div class="row pb-3">
                    <label for="curso_id_2" class="col-sm-8 col-form-label">ID curso pre requisito</label>
                    <div class="col-sm-4">
                      <input type="number" class="form-control" name="curso_id_2" id="curso_id_2" value="<?php echo $pre_requ->getId2() ?>" required />
                    </div>
                </div>         
                <?php if ($pre_requ->getId1() && $pre_requ->getId2()): ?>
                <input type="hidden" name="curso_id_1" value="<?php echo $pre_requ->getId1() ?>" />
                <input type="hidden" name="curso_id_2" value="<?php echo $pre_requ->getId2() ?>" />
                 <?php endif; ?>
                <div class="row">
                    <button type="submit" class="btn btn-primary mb-3" value="Guardar">Guardar</button>
                </div>
                <a href="index.php"> Cancelar </a>
            </form>
        </div>
    </body>
</html>