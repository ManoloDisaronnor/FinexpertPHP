<?php
include_once("cabecera.html");
?>

<div class="container-fluid w-75 mx-auto" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="procesar_buscar_servicio.php" name="frmBuscarServicio" id="frmBuscarServicio" method="get">
            <fieldset>
                <legend>Buscar un servicio</legend>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtBuscarServicioNombre">Nombre:</label>
                    <div class="col-xs-4">
                        <input id="txtBuscarServicioNombre" name="txtBuscarServicioNombre" placeholder="Nombre"
                            class="form-control input-md" type="text">
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 control-label" for="btnListarServicioPorNombre"></label>
                        <div class="col-xs-4">
                            <input type="submit" id="btnAceptarBuscarServicio" name="btnAceptarBuscarServicio" class="btn btn-primary" value="Aceptar"/>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>