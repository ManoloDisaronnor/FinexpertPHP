<?php
include_once("cabecera.html");
require_once("funcionesBD.php");
$conexion = obtenerConexion();

$sql = "SELECT * FROM Proyectos";
$resultado = mysqli_query($conexion, $sql);
$opcionesProyecto = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    $opcionesProyecto .= "<option value='" . $fila["id"] . "'>" . $fila["nombre"] . "</option>";
}
?>
<div class="container-fluid w-75 mx-auto" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="procesar_listar_servicios_proyecto.php" name="frmListarServiciosProyectos" id="frmListarServiciosProyectos" method="get">
            <fieldset>
                <legend>Listar un Servicio por proyecto</legend>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtListarServicioProyectoNombre">Proyecto:</label>
                    <div class="col-xs-4">
                    <select name="optListarServicioProyecto" id="optListarServicioProyecto" class="form-select">
                    <?php echo $opcionesProyecto; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 control-label" for="btnListarServicioporProyecto"></label>
                        <div class="col-xs-4">
                            <input type="submit" id="btnAceptarListarServicioProyecto" name="btnAceptarListarServicioProyecto" class="btn btn-primary" value="Aceptar"/>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>