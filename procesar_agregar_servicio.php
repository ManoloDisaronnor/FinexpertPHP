<?php
# **************************************************************** APARTADO DE ANGEL / PEDRO **************************************************************
require_once("funcionesBD.php");
$conexion = obtenerConexion();

$nombreServicio = $_POST['txtAgregarServicioNombre'];
$descripcionServicio = $_POST['txtAgregarServicioDescripcion'];
$precioServicio = $_POST['txtAgregarServicioPrecio'];

// Comprobar si el servicio ya existe
$sql = "SELECT * FROM Servicios WHERE nombre = '$nombreServicio'";
$resultadoconsulta = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultadoconsulta) > 0) {
    $mensaje = "<h2 class='text-center mt-5'>El servicio ya existe</h2>";
} else {
    $sql = "INSERT INTO Servicios (id, nombre, descripcion, precio) VALUES (null, '$nombreServicio', '$descripcionServicio', '$precioServicio')";
    $resultado = mysqli_query($conexion, $sql);
    if (mysqli_errno($conexion) != 0) {
        $numerror = mysqli_errno($conexion);
        $descrerror = mysqli_error($conexion);
        $mensaje = "<h2 class='text-center mt-5'>Se ha producido un error número $numerror que corresponde a: $descrerror</h2>";
    } else {
        $mensaje = "<h2 class='text-center mt-5'>Servicio insertado correctamente</h2>";
    }
}

header("refresh:4;url=index.php");

// Aquí empieza la página
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>