<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

$sql = "SELECT Proyectos.*, Servicios.nombre AS nombre_servicio
FROM Proyectos
LEFT JOIN Servicios_Proyectos ON Servicios_Proyectos.id_Proyecto = Proyectos.id
LEFT JOIN Servicios ON Servicios_Proyectos.id_Servicio = Servicios.id";

$tabla = "";
$resultado = mysqli_query($conexion, $sql);

if (mysqli_errno($conexion) == 0) {
    if (mysqli_num_rows($resultado) > 0) {
        $tabla = "<div class='container-fluid my-5 text-center'>
        <div class='px-2 table-responsive' id='contenidoBusqueda'>
        <table class='table table-striped'><thead><tr>
        <th scope='col'>Id</th>
        <th scope='col'>Nombre</th>
        <th scope='col'>Tipo</th>
        <th scope='col'>Objetivo</th>
        <th scope='col'>Presupuesto</th>
        <th scope='col'>Servicio</th>
        <th scope='col'>Acciones</th>
        </tr></thead><tbody class='table-group-divider'>";

        while ($fila = mysqli_fetch_assoc($resultado)) {
            $mensajeServicio = $fila['nombre_servicio'] === null ? "Sin datos" : $fila['nombre_servicio'];

            $tabla .= "<tr>
            <th scope='row' class='align-middle'>{$fila['id']}</th>
            <td class='align-middle'>{$fila['nombre']}</td>
            <td class='align-middle'>{$fila['tipo']}</td>
            <td class='align-middle'>{$fila['objetivo']}</td>
            <td class='align-middle'>{$fila['presupuesto']}</td>
            <td class='align-middle'>{$mensajeServicio}</td>
            <td class='align-middle'>
                <form action='modificar_proyecto.php' method='post' style='display: inline;'>
                    <input type='hidden' name='datos_proyecto' value='" . htmlspecialchars(json_encode($fila), ENT_QUOTES, 'UTF-8') . "'>
                    <button type='submit' class='btn btn-primary btn-sm mx-1'>
                        <i class='bi bi-pencil-square' id='lapiz'></i>
                    </button>
                </form>
                <form action='procesar_eliminar_proyecto.php' method='post' style='display: inline;'>
                    <input type='hidden' name='datos_proyecto' value='" . htmlspecialchars(json_encode($fila), ENT_QUOTES, 'UTF-8') . "'>
                    <button type='submit' class='btn btn-danger btn-sm mx-1'>
                        <i class='bi bi-trash3' id='basura'></i>
                    </button>
                </form>
            </td>
            </tr>";
        }
        $tabla .= "</tbody></table>";
    } else {
        $tabla = "<h2 class='text-center mt-5'>No se han encontrado proyectos</h2>";
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
