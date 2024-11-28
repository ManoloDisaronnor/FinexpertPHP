<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();


$sql = "SELECT Proyectos.id AS id_proyecto, Proyectos.nombre AS nombre_proyecto, Cliente.id AS id, Cliente.nombre, Cliente.apellidos, Cliente.correo, Cliente.genero 
FROM Cliente 
LEFT JOIN Proyectos ON Proyectos.id_Cliente = Cliente.id;";

$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) {
    $tabla = "<div class='container-fluid my-5 text-center'>
    <div class='px-2 table-responsive' id='contenidoBusqueda'>
    <table class='table table-striped'><thead><tr>
    <th scope='col'>Id_cliente</th>
    <th scope='col'>Nombre</th>
    <th scope='col'>Apellidos</th>
    <th scope='col'>Correo</th>
    <th scope='col'>Genero</th>
    <th scope='col'>Proyecto_asociado</th>
    <th scope='col'>Acciones</th>
    </tr></thead><tbody class='table-group-divider'>";
    
    while ($fila = mysqli_fetch_assoc($resultado)) {
        if ($fila['genero'] == "H") {
            $iconoGenero = "<i class='bi bi-gender-male'></i> Hombre";
        } else {
            $iconoGenero = "<i class='bi bi-gender-female'></i> Mujer";
        }
    
        $mensajeProyecto = $fila['id_proyecto'] === null ? "Sin datos" : $fila['nombre_proyecto'];
    
        $tabla .= "<tr>
        <th scope='row' class='align-middle'>{$fila['id']}</th>
        <td class='align-middle'>{$fila['nombre']}</td>
        <td class='align-middle'>{$fila['apellidos']}</td>
        <td class='align-middle'>{$fila['correo']}</td>
        <td class='align-middle'>{$iconoGenero}</td>
        <td class='align-middle'>{$mensajeProyecto}</td>
        <td class='align-middle'>
            <form action='modificar_cliente.php' method='post' style='display: inline;'>
                <input type='hidden' name='datos_cliente' value='" . htmlspecialchars(json_encode($fila), ENT_QUOTES, 'UTF-8') . "'>
                <button type='submit' class='btn btn-primary btn-sm mx-1'>
                    <i class='bi bi-pencil-square' id='lapiz'></i>
                </button>
            </form>
            <form action='procesar_eliminar_cliente.php' method='post' style='display: inline;'>
                <input type='hidden' name='datos_cliente' value='" . htmlspecialchars(json_encode($fila), ENT_QUOTES, 'UTF-8') . "'>
                <button type='submit' class='btn btn-danger btn-sm mx-1'>
                    <i class='bi bi-trash3' id='basura'></i>
                </button>
            </form>
        </td>
        </tr>";
    } 
    $tabla .= "</tbody></table>";

} else {
    $tabla = "<h2 class='text-center mt-5'>No se han encontrado clientes con el nombre $nombreCliente</h2>";
}

include_once("cabecera.html");
echo $tabla;
echo "</div></div>";