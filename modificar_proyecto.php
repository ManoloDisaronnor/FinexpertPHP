<?php
$datosProyecto = json_decode($_POST['datos_proyecto'], true);


require_once("funcionesBD.php");
$conexion = obtenerConexion();
$sqlProyectos = "SELECT * FROM Proyectos WHERE id_Proyecto = '{$datosProyecto['id']}'";
$resultadoProyectos = mysqli_query($conexion, $sqlProyectos);

 $tipoSeleccionado = "";
if ($datosProyecto['tipo'] == "Asesoría") {
    $tipoSeleccionado .= "<option value='Asesoría' selected>Asesoría</option>";
    $tipoSeleccionado .= "<option value='Auditoría'>Auditoría</option>";
    $tipoSeleccionado .= "<option value='Residencia'>Residencia</option>";
} else if ($datosProyecto['tipo'] == "Auditoría") {
    $tipoSeleccionado .= "<option value='Asesoría'>Asesoría</option>";
    $tipoSeleccionado .= "<option value='Auditoría' selected>Auditoría</option>";
    $tipoSeleccionado .= "<option value='Residencia'>Residencia</option>";
} else {
    $tipoSeleccionado .= "<option value='Asesoría'>Asesoría</option>";
    $tipoSeleccionado .= "<option value='Auditoría'>Auditoría</option>";
    $tipoSeleccionado .= "<option value='Residencia' selected>Residencia</option>";
}

$formulario = "";
$formulario .= "<form class='mx-auto w-75' method='post' action='procesar_modificar_proyecto.php'>";
$formulario .= "<label class='col-xs-4 control-label' for='txtModificarProyectoId'>Id:</label>";
$formulario .= "<div class='col-xs-4'>";
$formulario .= "<input id='txtModificarProyectoId' name='txtModificarProyectoId' class='form-control input-md' type='text' value='{$datosProyecto['id']}' readonly>";$formulario .= "</div>";

$formulario .= "<label class='col-xs-4 control-label' for='txtModificarProyectoNombre'>Nombre:</label>";
$formulario .= "<div class='col-xs-4'>";
$formulario .= "<input id='txtModificarProyectoNombre' name='txtModificarProyectoNombre' class='form-control input-md' type='text' value='{$datosProyecto['nombre']}'>";
$formulario .= "</div>";

$formulario .= "<label class='col-xs-4 control-label' for='optListarProyectoPorTipoServicio'>Tipo:</label>";
$formulario .= "<div class='col-xs-4'>";
$formulario .= "<select name='optListarProyectoPorTipoServicio' id='optListarProyectoPorTipoServicio' class='form-select'>";
$formulario .= $tipoSeleccionado;
$formulario .= "</select>";
$formulario .= "</div>";

$formulario .= "<label class='col-xs-4 control-label' for='txtModificarProyectoObjetivo'>Objetivo:</label>";
$formulario .= "<div class='col-xs-4'>";
$formulario .= "<input id='txtModificarProyectoObjetivo' name='txtModificarProyectoObjetivo' class='form-control input-md' type='text' value='{$datosProyecto['objetivo']}'>";
$formulario .= "</div>";

$formulario .= "<label class='col-xs-4 control-label' for='txtModificarProyectoPresupuesto'>Presupuesto:</label>";
$formulario .= "<div class='col-xs-4'>";
$formulario .= "<input id='txtModificarProyectoPresupuesto' name='txtModificarProyectoPresupuesto' class='form-control input-md' type='text' value='{$datosProyecto['presupuesto']}'>";
$formulario .= "</div>";
$formulario .= "<input type='submit' id='btnAceptarModificarProyecto' name='btnAceptarModificarProyecto' class='btn btn-primary' value='Aceptar'/>";
$formulario .= "<br>";
$formulario .= "</form>";


    include_once("cabecera.html");

echo $formulario;
?>