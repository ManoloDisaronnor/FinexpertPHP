<?
# **************************************************************** APARTADO DE MANUEL **************************************************************
require_once("funcionesBD.php");
$conexion = obtenerConexion();

$nombreCliente = $_POST['txtAgregarClienteNombre'];
$apellidosCliente = $_POST['txtAgregarClienteApellidos'];
$correoCliente = $_POST['txtAgregarClienteCorreo'];
$generoCliente = $_POST['optAgregarClienteGenero'];
$idProyecto = $_POST['optAgregarClienteProyecto'];

$sql = "INSERT INTO Cliente (id, nombre, apellidos, correo, genero) VALUES(null, '$nombreCliente' , '$apellidosCliente', '$correoCliente', '$generoCliente' ); ";

$resultado = mysqli_query($conexion, $sql);

if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    // Añadir if para no coger un id de proyecto si no se ha seleccionado ninguno
    if ($idProyecto == "") {
        $mensaje =  "<h2 class='text-center mt-5'>Cliente insertado correctamente </h2>";
    } else {
        $idClienteRecienInsertado = mysqli_insert_id($conexion);

        $sql = "UPDATE Proyectos SET id_Cliente = $idClienteRecienInsertado WHERE id = '$idProyecto';";
    
        $resultado = mysqli_query($conexion, $sql);
    
        if (mysqli_errno($conexion) != 0) {
            $numerror = mysqli_errno($conexion);
            $descrerror = mysqli_error($conexion);
            $mensaje =  "<h2 class='text-center mt-5'>Se ha insertado el cliente, pero se ha producido un error numero $numerror que corresponde a: $descrerror intentado asignarle un proyecto</h2>";
        } else {
            $mensaje =  "<h2 class='text-center mt-5'>Cliente insertado correctamente</h2>";
        }
    }
}

header( "refresh:4;url=index.php" );

// Aquí empieza la página
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>