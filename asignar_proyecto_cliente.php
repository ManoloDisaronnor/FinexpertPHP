<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

$sql = "SELECT id, nombre FROM Proyectos WHERE id_Cliente IS NULL;";
$resultado = mysqli_query($conexion, $sql);

$opcionesProyecto = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    $opcionesProyecto .= "<option value='" . $fila["id"] . "'>" . $fila["nombre"] . "</option>";
}

$sql = "SELECT id, nombre FROM Cliente;";
$resultado = mysqli_query($conexion, $sql);

$opcionesCliente = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    $opcionesCliente .= "<option value='" . $fila["id"] . "'>" . $fila["nombre"] . "</option>";
}

include_once("cabecera.html");
?>

<div class="container w-75 mx-auto" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="procesar_asignar_proyecto_cliente.php" name="frmAsignarProyectoCliente" id="frmAsignarProyectoCliente" method="post">
            <fieldset>
                <legend>Asignar un proyecto a un cliente</legend>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="optAsignarProyectoClienteCliente">Cliente:</label>
                    <div class="col-xs-4">
                        <select name="optAsignarProyectoClienteCliente" id="optAsignarProyectoClienteCliente" class="form-select">
                            <?php echo $opcionesCliente; ?>
                        </select>
                    </div>
                    <label class="col-xs-4 control-label" for="optAsignarProyectoClienteProyecto">Proyecto:</label>
                    <div class="col-xs-4">
                        <select name="optAsignarProyectoClienteProyecto" id="optAsignarProyectoClienteProyecto" class="form-select">
                            <?php echo $opcionesProyecto; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAsignarProyectoCliente"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarAsignarProyectoCliente" name="btnAceptarAsignarProyectoCliente" class="btn btn-primary" value="Aceptar"/>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>