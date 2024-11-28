<?php
include_once("cabecera.html");
?>

<div class="container-fluid w-75 mx-auto" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="procesar_buscar_cliente.php" name="frmBuscarCliente" id="frmBuscarCliente" method="get">
            <fieldset>
                <legend>Buscar un cliente</legend>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtBuscarClienteNombre">Nombre:</label>
                    <div class="col-xs-4">
                        <input id="txtBuscarClienteNombre" name="txtBuscarClienteNombre" placeholder="Nombre"
                            class="form-control input-md" type="text">
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 control-label" for="btnListarClientePorNombre"></label>
                        <div class="col-xs-4">
                            <input type="submit" id="btnAceptarBuscarCliente" name="btnAceptarBuscarCliente" class="btn btn-primary" value="Aceptar"/>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>