<?php
include_once("cabecera.html");
?>

<div class="container-fluid w-75 mx-auto" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="procesar_listar_clientes_genero.php" name="frmListarClienteGenero" id="frmListarClienteGenero" method="get">
            <fieldset>
                <legend>Listar un cliente por genero</legend>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtListarClienteGeneroNombre">Genero:</label>
                    <div class="col-xs-4">
                    <select name="optListarClienteGenero" id="optListarClienteGenero" class="form-select">
                            <option value="H">Hombre</option>
                            <option value="M">Mujer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 control-label" for="btnListarClientePorNombre"></label>
                        <div class="col-xs-4">
                            <input type="submit" id="btnAceptarListarClienteGenero" name="btnAceptarListarClienteGenero" class="btn btn-primary" value="Aceptar"/>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>