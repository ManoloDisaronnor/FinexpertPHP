<?php
$datosCliente = json_decode($_POST['datos_cliente'], true);

$generoSeleccionado = "";
if ($datosCliente['genero'] == "H") {
    $generoSeleccionado .= "<option value='H' selected>Hombre</option>";
    $generoSeleccionado .= "<option value='M'>Mujer</option>";
} else {
    $generoSeleccionado .= "<option value='H'>Hombre</option>";
    $generoSeleccionado .= "<option value='M' selected>Mujer</option>";
}

require_once("funcionesBD.php");
$conexion = obtenerConexion();
$sqlProyectos = "SELECT id, nombre FROM Proyectos WHERE id_Cliente IS NULL OR id_Cliente = '{$datosCliente['id']}'";
$resultadoProyectos = mysqli_query($conexion, $sqlProyectos);

$opcionesProyectos = "";
while ($proyecto = mysqli_fetch_assoc($resultadoProyectos)) {
    $proyectoId = (string)$proyecto['id'];
    $datosClienteIdProyecto = (string)$datosCliente['id_proyecto'];
    $selected = ($proyectoId === $datosClienteIdProyecto) ? "selected" : "";
    $opcionesProyectos .= "<option value='{$proyecto['id']}' $selected>{$proyecto['nombre']}</option>";
}

$formulario = "";
$formulario .= "<form class='mx-auto w-75' method='post' action='procesar_modificar_cliente.php'>";
$formulario .= "<label class='col-xs-4 control-label' for='txtModificarClienteId'>Id:</label>";
$formulario .= "<div class='col-xs-4 mb-3'>";
$formulario .= "<input id='txtModificarClienteId' name='txtModificarClienteId' placeholder='Id' class='form-control input-md' type='text' value='{$datosCliente['id']}' readonly>";
$formulario .= "</div>";
$formulario .= "<label class='col-xs-4 control-label' for='txtModificarClienteNombre'>Nombre:</label>";
$formulario .= "<div class='col-xs-4 mb-3'>";
$formulario .= "<input id='txtModificarClienteNombre' name='txtModificarClienteNombre' placeholder='Nombre' class='form-control input-md' type='text' value='{$datosCliente['nombre']}'>";
$formulario .= "</div>";
$formulario .= "<label class='col-xs-4 control-label' for='txtModificarClienteApellidos'>Apellidos:</label>";
$formulario .= "<div class='col-xs-4 mb-3'>";
$formulario .= "<input id='txtModificarClienteApellidos' name='txtModificarClienteApellidos' placeholder='Apellidos' class='form-control input-md' type='text' value='{$datosCliente['apellidos']}'>";
$formulario .= "</div>";
$formulario .= "<label class='col-xs-4 control-label' for='txtModificarClienteCorreo'>Correo:</label>";
$formulario .= "<div class='col-xs-4 mb-3'>";
$formulario .= "<input id='txtModificarClienteCorreo' name='txtModificarClienteCorreo' placeholder='Correo' class='form-control input-md' type='text' value='{$datosCliente['correo']}'>";
$formulario .= "</div>";
$formulario .= "<label class='col-xs-4 control-label' for='optModificarClienteGenero'>Género:</label>";
$formulario .= "<div class='col-xs-4 mb-3'>";
$formulario .= "<select name='optModificarClienteGenero' id='optModificarClienteGenero' class='form-select'>";
$formulario .= $generoSeleccionado;
$formulario .= "</select>";
$formulario .= "</div>";
$formulario .= "<label class='col-xs-4 control-label' for='optModificarClienteProyecto'>Proyecto asociado:</label>";
$formulario .= "<div class='col-xs-4 mb-3'>";
$formulario .= "<select name='optModificarClienteProyecto' id='optModificarClienteProyecto' class='form-select'>";
$formulario .= $opcionesProyectos;
$formulario .= "</select>";
$formulario .= "</div>";
$formulario .= "<input type='submit' id='btnAceptarModificarCliente' name='btnAceptarModificarCliente' class='btn btn-primary' value='Aceptar'/>";
$formulario .= "</form>";

include_once("cabecera.html");

echo $formulario;
?>

