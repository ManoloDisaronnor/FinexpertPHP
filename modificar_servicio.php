<?php
$datosServicio = json_decode($_POST['datos_servicio'], true);


require_once("funcionesBD.php");
$conexion = obtenerConexion();
$sqlProyectos = "SELECT * FROM Servicios WHERE id_Servicio = '{$datosServicio['id']}'";
$resultadoProyectos = mysqli_query($conexion, $sqlProyectos);

$formulario = "";
$formulario .= "<form class='mx-auto w-75' method='post' action='procesar_modificar_servicio.php'>";
$formulario .= "<label class='col-xs-4 control-label' for='txtModificarServicioId'>Id:</label>";
$formulario .= "<div class='col-xs-4 mb-3'>";
$formulario .= "<input id='txtModificarServicioId' name='txtModificarServicioId' placeholder='Id' class='form-control input-md' type='text' value='{$datosServicio['id']}' readonly>";
$formulario .= "</div>";
$formulario .= "<label class='col-xs-4 control-label' for='txtModificarServicioNombre'>Nombre:</label>";
$formulario .= "<div class='col-xs-4 mb-3'>";
$formulario .= "<input id='txtModificarServicioNombre' name='txtModificarServicioNombre' placeholder='Nombre' class='form-control input-md' type='text' value='{$datosServicio['nombre']}'>";
$formulario .= "</div>";
$formulario .= "<label class='col-xs-4 control-label' for='txtModificarServicioDescripcion'>Descripcion:</label>";
$formulario .= "<div class='col-xs-4 mb-3'>";
$formulario .= "<input id='txtModificarServicioDescripcion' name='txtModificarServicioDescripcion' placeholder='Descripcion' class='form-control input-md' type='text' value='{$datosServicio['descripcion']}'>";
$formulario .= "</div>";
$formulario .= "<label class='col-xs-4 control-label' for='txtModificarServicioPrecio'>Precio:</label>";
$formulario .= "<div class='col-xs-4 mb-3'>";
$formulario .= "<input id='txtModificarServicioPrecio' name='txtModificarServicioPrecio' placeholder='Precio' class='form-control input-md' type='text' value='{$datosServicio['precio']}'>";
$formulario .= "</div>";
$formulario .= "<input type='submit' id='btnAceptarModificarServicio' name='btnAceptarModificarServicio' class='btn btn-primary' value='Aceptar'/>";
$formulario .= "</form>";

include_once("cabecera.html");

echo $formulario;
?>

