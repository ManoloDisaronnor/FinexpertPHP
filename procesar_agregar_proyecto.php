<?php
# **************************************************************** APARTADO DE PEDRO **************************************************************
require_once("funcionesBD.php");
$conexion = obtenerConexion();

$nombreProyecto = mysqli_real_escape_string($conexion, $_POST['txtAgregarTipoServicioNombre']);
$tipoProyecto = mysqli_real_escape_string($conexion, $_POST['optListarProyectoPorTipoServicio']);
$objetivoProyecto = mysqli_real_escape_string($conexion, $_POST['txtAgregarTipoServicioObjetivo']);
$presupuestoProyecto = floatval($_POST['txtAgregarTipoServicioPresupuesto']); // Convertir a FLOAT

// Comprobar si el PROYECTO ya existe
$sql = "SELECT * FROM Proyectos WHERE nombre = '$nombreProyecto'";
$resultadoconsulta = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultadoconsulta) > 0) {
    $mensaje = "<h2 class='text-center mt-5'>El proyecto ya existe</h2>";
} else {
    $sql = "INSERT INTO Proyectos (id, nombre, tipo, objetivo, presupuesto) VALUES (null, '$nombreProyecto', '$tipoProyecto', 
    '$objetivoProyecto', $presupuestoProyecto)";
    $resultado = mysqli_query($conexion, $sql);
    if (mysqli_errno($conexion) != 0) {
        $numerror = mysqli_errno($conexion);
        $descrerror = mysqli_error($conexion);
        $mensaje = "<h2 class='text-center mt-5'>Se ha producido un error número $numerror que corresponde a: $descrerror</h2>";
    } else {
        $mensaje = "<h2 class='text-center mt-5'>Proyecto insertado correctamente</h2>";
    }
}

header("refresh:4;url=index.php");

// Aquí empieza la página
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>