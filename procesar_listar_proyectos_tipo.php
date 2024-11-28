<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Validar entrada
if (!isset($_GET['optListarProyectoTipo']) || empty($_GET['optListarProyectoTipo'])) {
    die("<h2 class='text-center mt-5'>Debe seleccionar un tipo de proyecto.</h2>");
}

$tipoProyecto = mysqli_real_escape_string($conexion, $_GET['optListarProyectoTipo']);

// Consulta corregida
$sql = "SELECT id, nombre, tipo, objetivo, presupuesto 
        FROM Proyectos 
        WHERE tipo = '$tipoProyecto'";

$resultado = mysqli_query($conexion, $sql);

if (!$resultado) {
    die("<h2>Error en la consulta SQL: " . mysqli_error($conexion) . "</h2>");
}

if (mysqli_num_rows($resultado) > 0) {
    $tabla = "<div class='container-fluid my-5 text-center'>
    <div class='px-2 table-responsive' id='contenidoBusqueda'>
    <table class='table table-striped'><thead><tr>
    <th scope='col'>Id</th>
    <th scope='col'>Nombre</th>
    <th scope='col'>Tipo</th>
    <th scope='col'>Objetivo</th>
    <th scope='col'>Presupuesto</th>
    <th scope='col'>Acciones</th>
    </tr></thead><tbody class='table-group-divider'>";

    while ($fila = mysqli_fetch_assoc($resultado)) {
        $datosJson = htmlspecialchars(json_encode($fila), ENT_QUOTES, 'UTF-8');

        $tabla .= "<tr>
        <th scope='row' class='align-middle'>{$fila['id']}</th>
        <td class='align-middle'>{$fila['nombre']}</td>
        <td class='align-middle'>{$fila['tipo']}</td>
        <td class='align-middle'>{$fila['objetivo']}</td>
        <td class='align-middle'>{$fila['presupuesto']}</td>
        <td class='align-middle'>
            <form action='modificar_proyecto.php' method='post' style='display: inline;'>
                <input type='hidden' name='datos_proyecto' value='$datosJson'>
                <button type='submit' class='btn btn-primary btn-sm mx-1'>
                    <i class='bi bi-pencil-square' id='lapiz'></i>
                </button>
            </form>
            <form action='procesar_eliminar_proyecto.php' method='post' style='display: inline;'>
                <input type='hidden' name='datos_proyecto' value='$datosJson'>
                <button type='submit' class='btn btn-danger btn-sm mx-1'>
                    <i class='bi bi-trash3' id='basura'></i>
                </button>
            </form>
        </td>
        </tr>";
    }
    $tabla .= "</tbody></table></div></div>";

} else {
    echo "<h2 class='text-center mt-5'>No se han encontrado proyectos con el tipo $tipoProyecto</h2>";
}

mysqli_close($conexion);

include_once("cabecera.html");
echo $tabla;
echo "</div></div>";
?>

