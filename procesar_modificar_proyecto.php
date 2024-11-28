<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Escapar valores
$idProyecto = mysqli_real_escape_string($conexion, $_POST['txtModificarProyectoId']);
$nombreProyecto = mysqli_real_escape_string($conexion, $_POST['txtModificarProyectoNombre']);
$tipoProyecto = mysqli_real_escape_string($conexion, $_POST['optListarProyectoPorTipoServicio']);
$objetivoProyecto = mysqli_real_escape_string($conexion, $_POST['txtModificarProyectoObjetivo']);
$presupuestoProyecto = floatval($_POST['txtModificarProyectoPresupuesto']); // Convertir a FLOAT

// Comprobar si el nombre del Proyecto ya existe, excluyendo el Proyecto actual
$sqlComprobarNombre = "SELECT * FROM Proyectos WHERE nombre = '$nombreProyecto' AND id != '$idProyecto'";
$resultadoComprobarNombre = mysqli_query($conexion, $sqlComprobarNombre);

if (mysqli_num_rows($resultadoComprobarNombre) > 0) {
    $mensaje = "El nombre del proyecto ya existe";
} else {
    // Usar sentencia preparada para la actualización
    $stmt = $conexion->prepare("UPDATE Proyectos SET nombre = ?, tipo = ?, objetivo = ?, presupuesto = ? WHERE id = ?");
    $stmt->bind_param("sssdi", $nombreProyecto, $tipoProyecto, $objetivoProyecto, $presupuestoProyecto, $idProyecto);

    if ($stmt->execute()) {
        $mensaje = "Se ha modificado el proyecto";
    } else {
        $numerror = $conexion->errno;
        $descrerror = $conexion->error;
        $mensaje = "Se ha producido un error número $numerror que corresponde a: $descrerror <br>";
    }

    $stmt->close();
}

header("refresh:4;url=index.php");

include_once("cabecera.html");
echo "<h2 class='text-center mt-5'>$mensaje</h2>";

$conexion->close();
?>
