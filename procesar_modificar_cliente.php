<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

$idCliente = $_POST['txtModificarClienteId'];
$nombreCliente = $_POST['txtModificarClienteNombre'];
$apellidosCliente = $_POST['txtModificarClienteApellidos'];
$correoCliente = $_POST['txtModificarClienteCorreo'];
$generoCliente = $_POST['optModificarClienteGenero'];
$idProyecto = $_POST['optModificarClienteProyecto'];

$sql = "UPDATE Cliente SET nombre = '$nombreCliente', apellidos = '$apellidosCliente', correo = '$correoCliente', genero = '$generoCliente' WHERE id = $idCliente;";
mysqli_query($conexion, $sql);
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    if ($numerror == 1062) {
        $mensaje = "Ya existe un cliente con ese correo";
    } else {
        $mensaje = "Se ha producido un error número $numerror que corresponde a: $descrerror <br>";
    }
} else {
    $sql = "UPDATE Proyectos SET id_Cliente = NULL WHERE id_Cliente = $idCliente;";
    mysqli_query($conexion, $sql);
    if (mysqli_errno($conexion) != 0) {
        $numerror = mysqli_errno($conexion);
        $descrerror = mysqli_error($conexion);
        $mensaje = "Se ha producido un error número $numerror que corresponde a: $descrerror <br>";
    } else {
        $sql = "UPDATE Proyectos SET id_Cliente = $idCliente WHERE id = $idProyecto;";
        mysqli_query($conexion, $sql);
        if (mysqli_errno($conexion) != 0) {
            $numerror = mysqli_errno($conexion);
            $descrerror = mysqli_error($conexion);
            $mensaje = "Se ha producido un error número $numerror que corresponde a: $descrerror <br>";
        } else {
            $mensaje = "Se ha modificado el cliente";
        }
    }
}

header( "refresh:4;url=index.php" );

include_once("cabecera.html");
echo "<h2 class='text-center mt-5'>$mensaje</h2>";

?>