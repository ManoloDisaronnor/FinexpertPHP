<?php
# ************************************************************** APARTADO DE Angel **************************************************************
require_once("funcionesBD.php");
$conexion = obtenerConexion();


include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="procesar_agregar_servicio.php" name="frmAgregarServicio" id="frmAgregarServicio" method="post">
            <fieldset>
                <legend>Agregar un nuevo servicio</legend>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtAgregarServicioNombre">Nombre:</label>
                    <div class="col-xs-4">
                        <input id="txtAgregarServicioNombre" name="txtAgregarServicioNombre" placeholder="Nombre"
                            class="form-control input-md" type="text">
                    </div>
                    <label class="col-xs-4 control-label" for="txtAgregarServicioDescripcion">Descripcion:</label>
                    <div class="col-xs-4">
                        <input id="txtAgregarServicioDescripcion" name="txtAgregarServicioDescripcion"
                            placeholder="Descripcion" class="form-control input-md" type="text">
                    </div>
                    <label class="col-xs-4 control-label" for="txtAgregarServicioPrecio">Precio:</label>
                    <div class="col-xs-4">
                        <input id="txtAgregarServicioPrecio" name="txtAgregarServicioPrecio"
                            placeholder="12345" class="form-control input-md" type="number">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAgregarServicio"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarAgregarServicio" name="btnAceptarAgregarServicio" class="btn btn-primary" value="Aceptar"/>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>

</html>