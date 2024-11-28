<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

$datosProyecto = json_decode($_POST['datos_proyecto'], true);

$sql = "DELETE FROM Proyectos WHERE id = '{$datosProyecto['id']}'";
mysqli_query($conexion, $sql);

if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje = "Se ha producido un error número $numerror que corresponde a: $descrerror <br>";
} else {
    $mensaje = "Se ha eliminado el proyecto";
}

header("refresh:4;url=index.php");

include_once("cabecera.html");
echo "<h2 class='text-center mt-5'>$mensaje</h2>";

?>