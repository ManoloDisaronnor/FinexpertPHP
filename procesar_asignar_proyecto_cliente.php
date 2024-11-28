<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

$idCliente = $_POST["optAsignarProyectoClienteCliente"];
$idProyecto = $_POST["optAsignarProyectoClienteProyecto"];

$sql = "UPDATE Proyectos SET id_Cliente = '$idCliente' WHERE id = '$idProyecto';";
mysqli_query($conexion, $sql);

if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha insertado el cliente, pero se ha producido un error numero $numerror que corresponde a: $descrerror intentado asignarle un proyecto</h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>Cliente insertado correctamente</h2>";
}

include_once("cabecera.html");
echo $mensaje;
?>