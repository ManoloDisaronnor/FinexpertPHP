<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

$nombreProyecto = $_GET['txtBuscarProyecto'];

$sql = "SELECT * FROM Proyectos
WHERE Proyectos.nombre LIKE '%" . $nombreProyecto . "%';";

$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) {
    $tabla = "<div class='container-fluid my-5 text-center'>
    <div class='px-2 table-responsive' id='contenidoBusqueda'>
    <table class='table table-striped'><thead><tr>
    <th scope='col'>Id_proyecto</th>
    <th scope='col'>Nombre</th>
    <th scope='col'>Tipo</th>
    <th scope='col'>Objetivo</th>
    <th scope='col'>Presupuesto</th>
    <th scope='col'>Acciones</th>
    </tr></thead><tbody class='table-group-divider'>";
    
    while ($fila = mysqli_fetch_assoc($resultado)) {
        
        $tabla .= "<tr>
        <th scope='row' class='align-middle'>{$fila['id']}</th>
        <td class='align-middle'>{$fila['nombre']}</td>
        <td class='align-middle'>{$fila['tipo']}</td>
        <td class='align-middle'>{$fila['objetivo']}</td>
        <td class='align-middle'>{$fila['presupuesto']}</td>
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
    $tabla = "<h2 class='text-center mt-5'>No se han encontrado proyectos con el nombre $nombreProyecto</h2>";
}

include_once("cabecera.html");
echo $tabla;
echo "</div></div>";