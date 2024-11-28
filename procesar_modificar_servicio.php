<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

$idServicio = $_POST['txtModificarServicioId'];
$nombreServicio = $_POST['txtModificarServicioNombre'];
$descripcionServicio = $_POST['txtModificarServicioDescripcion'];
$precioServicio = $_POST['txtModificarServicioPrecio'];

// Comprobar si el nombre del servicio ya existe, excluyendo el servicio actual
$sqlComprobarNombre = "SELECT * FROM Servicios WHERE nombre = '$nombreServicio' AND id != '$idServicio'";
$resultadoComprobarNombre = mysqli_query($conexion, $sqlComprobarNombre);

if (mysqli_num_rows($resultadoComprobarNombre) > 0) {
    $mensaje = "El nombre del servicio ya existe";
} else {
    $sql = "UPDATE Servicios SET nombre = '$nombreServicio', descripcion = '$descripcionServicio', precio = '$precioServicio' WHERE id = $idServicio";
    mysqli_query($conexion, $sql);
    if (mysqli_errno($conexion) != 0) {
        $numerror = mysqli_errno($conexion);
        $descrerror = mysqli_error($conexion);
        $mensaje = "Se ha producido un error número $numerror que corresponde a: $descrerror <br>";
    } else {
        $mensaje = "Se ha modificado el servicio";
    }
}

header("refresh:4;url=index.php");

include_once("cabecera.html");
echo "<h2 class='text-center mt-5'>$mensaje</h2>";

?>