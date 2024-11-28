<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

$sql = "SELECT Servicios.*, Proyectos.nombre AS nombre_proyecto
FROM Servicios
LEFT JOIN Servicios_Proyectos ON Servicios_Proyectos.id_Servicio = Servicios.id
LEFT JOIN Proyectos ON Servicios_Proyectos.id_Proyecto = Proyectos.id";

$tabla = "";
$resultado = mysqli_query($conexion, $sql);
if (mysqli_errno($conexion) == 0) {
    if (mysqli_num_rows($resultado) > 0) {
        $tabla = "<div class='container-fluid my-5 text-center'>
    <div class='px-2 table-responsive' id='contenidoBusqueda'>
    <table class='table table-striped'><thead><tr>
    <th scope='col'>Id_cliente</th>
    <th scope='col'>Nombre</th>
    <th scope='col'>Descripcion</th>
    <th scope='col'>Precio</th>
    <th scope='col'>Proyecto</th>
    <th scope='col'>Acciones</th>
    </tr></thead><tbody class='table-group-divider'>";

        while ($fila = mysqli_fetch_assoc($resultado)) {
            $mensajeProyecto = $fila['nombre_proyecto'] === null ? "Sin datos" : $fila['nombre_proyecto'];

            $tabla .= "<tr>
        <th scope='row' class='align-middle'>{$fila['id']}</th>
        <td class='align-middle'>{$fila['nombre']}</td>
        <td class='align-middle'>{$fila['descripcion']}</td>
        <td class='align-middle'>{$fila['precio']}</td>
        <td class='align-middle'>{$mensajeProyecto}</td>
        <td class='align-middle'>
            <form action='modificar_servicio.php' method='post' style='display: inline;'>
                <input type='hidden' name='datos_servicio' value='" . htmlspecialchars(json_encode($fila), ENT_QUOTES, 'UTF-8') . "'>
                <button type='submit' class='btn btn-primary btn-sm mx-1'>
                    <i class='bi bi-pencil-square' id='lapiz'></i>
                </button>
            </form>
            <form action='procesar_eliminar_servicio.php' method='post' style='display: inline;'>
                <input type='hidden' name='datos_servicio' value='" . htmlspecialchars(json_encode($fila), ENT_QUOTES, 'UTF-8') . "'>
                <button type='submit' class='btn btn-danger btn-sm mx-1'>
                    <i class='bi bi-trash3' id='basura'></i>
                </button>
            </form>
        </td>
        </tr>";
        }
        $tabla .= "</tbody></table>";

    } else {
        $tabla = "<h2 class='text-center mt-5'>No se han encontrado servicios</h2>";
    }
} else {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje = "Se ha producido un error número $numerror que corresponde a: $descrerror";
}

include_once("cabecera.html");
echo $tabla;
echo "</div></div>";
?>