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
        <form class="form-horizontal w-75 mx-auto" name="frmListarProyectoPorTipoServicio"
            id="frmListarProyectoPorTipoServicio" action="procesar_listar_proyectos_tipo.php" method="get">
            <fieldset>
                <legend>Listar proyectos por tipo</legend>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="optListarProyectoTipo">Tipo:</label>
                    <div class="col-xs-4">
                        <select name="optListarProyectoTipo" id="optListarProyectoTipo" class="form-select">
                            <option value="">--Seleccione una opción--</option>
                            <option value="Asesoría">Asesoría</option>
                            <option value="Auditoría">Auditoría</option>
                            <option value="Residencia">Residencia</option>
                        </select>


                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 control-label" for="btnListarProyectoPorTipoServicio"></label>
                        <div class="col-xs-4">
                            <input type="submit" id="btnListarProyectoPorTipoServicio"
                                name="btnListarProyectoPorTipoServicio" class="btn btn-primary mb-3" value="Aceptar"
                                onclick="procesarListarProyectoPorTipo()" value="Aceptar" />
                        </div>
                    </div>
                </div>
            </fieldset>
            <!-- Div para mostrar los proyectos buscados por nombre -->
            <div class="container-fluid my-5 text-center">
                <div class="px-2 table-responsive" id="contenidoListarProyectos">

                </div>
            </div>
        </form>
    </div>
</div>
</body>

</html>