<?php
# ************************************************************** APARTADO DE Pedro **************************************************************
require_once("funcionesBD.php");
$conexion = obtenerConexion();


include_once("cabecera.html");
?>


<div class="container" id="formularios">
    <div class="row">
        <!-- Formulario para agregar un proyecto -->
        <form class="form-horizontal w-75 mx-auto" name="frmAgregarTipoServicio" id="frmAgregarTipoServicio" action="procesar_agregar_proyecto.php" method="post">
            <fieldset>
                <legend>Agregar un nuevo proyecto</legend>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtAgregarTipoServicioNombre">Nombre:</label>
                    <div class="col-xs-4">
                        <input id="txtAgregarTipoServicioNombre" name="txtAgregarTipoServicioNombre"
                            placeholder="Nombre" class="form-control input-md" type="text">
                    </div>

                    <label class="col-xs-4 control-label" for="optListarProyectoPorTipoServicio">Tipo:</label>
                    <select name="optListarProyectoPorTipoServicio" id="optListarProyectoPorTipoServicio"
                        class="form-select">
                        <option value="" disabled selected>--Seleccione una opción--</option>
                        <option value="Asesoría">Asesoría</option>
                        <option value="Auditoría">Auditoría</option>
                        <option value="Residencia">Residencia</option>
                    </select>

                    <label class="col-xs-4 control-label" for="txtAgregarTipoServicioObjetivo">Objetivo:
                    </label>
                    <div class="col-xs-4">
                        <input id="txtAgregarTipoServicioObjetivo" name="txtAgregarTipoServicioObjetivo"
                            placeholder="Objetivo" class="form-control input-md" type="text">
                    </div>
                    <label class="col-xs-4 control-label" for="txtAgregarTipoServicioPresupuesto">Presupuesto:
                    </label>
                    <div class="col-xs-4">
                        <input id="txtAgregarTipoServicioPresupuesto" name="txtAgregarTipoServicioPresupuesto"
                            placeholder="Presupuesto" class="form-control input-md" type="number">
                    </div>

                    <div class="form-groupq">
                        <label class="col-xs-4 control-label" for="btnAgregarTipoServicio"></label>
                        <div class="col-xs-4">
                            <input type="submit" id="btnAgregarTipoServicio" name="btnAgregarTipoServicio"
                                class="btn btn-primary mb-3" value="Aceptar" />
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>

</html>