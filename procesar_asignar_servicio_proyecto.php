<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

$idProyecto = $_POST['optAsignarProyectoServicioProyecto'];
$idServicio = $_POST['optAsignarProyectoServicioServicio'];

// Comprobar si la asignación ya existe
$sqlComprobar = "SELECT * FROM Servicios_Proyectos WHERE id_Proyecto = '$idProyecto' AND id_Servicio = '$idServicio'";
$resultadoComprobar = mysqli_query($conexion, $sqlComprobar);

if (mysqli_num_rows($resultadoComprobar) > 0) {
    $mensaje = "La asignación de ese servicio con ese proyecto ya existe";
} else {
    // Insertar la asignación en la tabla Servicios_Proyectos
    $sqlInsertar = "INSERT INTO Servicios_Proyectos (id_Proyecto, id_Servicio) VALUES ('$idProyecto', '$idServicio')";
    $resultadoInsertar = mysqli_query($conexion, $sqlInsertar);

    if (mysqli_errno($conexion) != 0) {
        $numerror = mysqli_errno($conexion);
        $descrerror = mysqli_error($conexion);
        $mensaje = "Se ha producido un error número $numerror que corresponde a: $descrerror";
    } else {
        $mensaje = "Asignado correctamente";
    }
}

// Mover la llamada a header() antes de cualquier salida
header("refresh:4;url=index.php");

// Incluir la cabecera después de la llamada a header()
include_once("cabecera.html");
echo "<h2 class='text-center mt-5'>$mensaje</h2>";
?>