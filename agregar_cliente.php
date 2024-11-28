<?php
# ************************************************************** APARTADO DE MANUEL **************************************************************
require_once("funcionesBD.php");
$conexion = obtenerConexion();

$sql = "SELECT id, nombre FROM Proyectos WHERE id_Cliente IS NULL;";
$resultado = mysqli_query($conexion, $sql);

$opciones = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    $opciones .= "<option value='" . $fila["id"] . "'>" . $fila["nombre"] . "</option>";
}

include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="procesar_agregar_cliente.php" name="frmAgregarCliente" id="frmAgregarCliente" method="post">
            <fieldset>
                <legend>Agregar un nuevo cliente</legend>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtAgregarClienteNombre">Nombre:</label>
                    <div class="col-xs-4">
                        <input id="txtAgregarClienteNombre" name="txtAgregarClienteNombre" placeholder="Nombre"
                            class="form-control input-md" type="text">
                    </div>
                    <label class="col-xs-4 control-label" for="txtAgregarClienteApellidos">Apellidos:</label>
                    <div class="col-xs-4">
                        <input id="txtAgregarClienteApellidos" name="txtAgregarClienteApellidos"
                            placeholder="Apellidos" class="form-control input-md" type="text">
                    </div>
                    <label class="col-xs-4 control-label" for="txtAgregarClienteCorreo">Correo:</label>
                    <div class="col-xs-4">
                        <input id="txtAgregarClienteCorreo" name="txtAgregarClienteCorreo"
                            placeholder="tunombre@porejemplo.com" class="form-control input-md" type="text">
                    </div>
                    <label class="col-xs-4 control-label" for="optAgregarClienteGenero">Genero:</label>
                    <div class="col-xs-4">
                        <select name="optAgregarClienteGenero" id="optAgregarClienteGenero" class="form-select">
                            <option value="H">Hombre</option>
                            <option value="M">Mujer</option>
                        </select>
                    </div>
                    <label class="col-xs-4 control-label" for="optAgregarClienteProyecto">Proyecto del cliente:</label>
                    <div class="col-xs-4">
                        <select name="optAgregarClienteProyecto" id="optAgregarClienteProyecto" class="form-select">
                            <?php echo $opciones; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAgregarCliente"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarAgregarCliente" name="btnAceptarAgregarCliente" class="btn btn-primary" value="Aceptar"/>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>

</html>