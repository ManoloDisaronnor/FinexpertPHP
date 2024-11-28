<?php
include_once("cabecera.html");
?>

<div class="container-fluid w-75 mx-auto" id="formularios">
    <div class="row">
        <form class="form-horizontal w-75 mx-auto" action="procesar_buscar_proyecto.php" name="frmBuscarTipoServicio" id="frmBuscarTipoServicio" method="get">
            <fieldset>
                <legend>Buscar un proyecto por su nombre</legend>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtBuscarProyecto">Nombre del
                        Proyecto:</label>
                    <div class="col-xs-4">
                        <input id="txtBuscarProyecto" name="txtBuscarProyecto" placeholder="Nombre del Proyecto"
                            class="form-control input-md" type="text">
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 control-label" for="btnBuscarTipoServicio"></label>
                        <div class="col-xs-4">
                            <input type="submit" id="btnBuscarTipoServicio" name="btnBuscarTipoServicio"
                                class="btn btn-primary mb-3" value="Aceptar" />
                        </div>
                    </div>
                </div>
            </fieldset>

            <!-- Div para mostrar los proyectos buscados por nombre -->
            <div class="container-fluid my-5 text-center">
                <div class="px-2 table-responsive" id="contenidoBusquedaProyecto">

                </div>
            </div>
        </form>
    </div>
</div>
</body>

</html>