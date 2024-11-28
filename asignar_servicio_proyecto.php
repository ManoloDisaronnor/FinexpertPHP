<?php

require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Obtener los proyectos
$sql = "SELECT id, nombre FROM Proyectos;";
$resultado = mysqli_query($conexion, $sql);

$opcionesProyecto = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    $opcionesProyecto .= "<option value='" . $fila["id"] . "'>" . $fila["nombre"] . "</option>";
}

// Obtener los servicios
$sql = "SELECT id, nombre FROM Servicios;";
$resultado = mysqli_query($conexion, $sql);

$opcionesServicio = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    $opcionesServicio .= "<option value='" . $fila["id"] . "'>" . $fila["nombre"] . "</option>";
}

include_once("cabecera.html");
?>

<div class="container w-75 mx-auto" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="procesar_asignar_servicio_proyecto.php" name="frmAsignarProyectoServicio" id="frmAsignarProyectoServicio" method="post">
            <fieldset>
                <legend>Asignar un servicio a un proyecto o viceversa</legend>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="optAsignarProyectoServicioProyecto">Proyecto:</label>
                    <div class="col-xs-4">
                        <select name="optAsignarProyectoServicioProyecto" id="optAsignarProyectoServicioProyecto" class="form-select">
                            <?php echo $opcionesProyecto; ?>
                        </select>
                    </div>
                    <label class="col-xs-4 control-label" for="optAsignarProyectoServicioServicio">Servicio:</label>
                    <div class="col-xs-4">
                        <select name="optAsignarProyectoServicioServicio" id="optAsignarProyectoServicioServicio" class="form-select">
                            <?php echo $opcionesServicio; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAsignarProyectoServicio"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarAsignarProyectoServicio" name="btnAceptarAsignarProyectoServicio" class="btn btn-primary" value="Aceptar"/>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>