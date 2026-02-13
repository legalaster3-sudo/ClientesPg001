<?php
require_once 'conexionpg.php';
//CONSULTA
$query="SELECT id_clientes, nombres, apellido_paterno, apellido_materno, ci, direccion, fecha_de_nacimiento FROM clientesdb ORDER BY id_clientes ASC";

$resultado=pg_query($conectar, $query);
if (!$resultado){
    die(" error en la consulta");
    
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>listado de clientes</title>
   <link rel="stylesheet"href="misestilos.css">
</head>
<body>
    <h2>listado de clientes</h2>
<table>
    <tr>
        <th>id</th>
        <th>nombres</th>         
        <th>apellido_paterno</th>
        <th>apellido_materno</th>
        <th>ci</th>        
        <th>direccion</th>
        <th>fecha_de_nacimiento</th> </tr> 
<?php
while($fila=pg_fetch_assoc($resultado)){
    echo "<tr>";
    echo "<td>".$fila['id_clientes']."</td>";
    echo "<td>".$fila['nombres']."</td>";
    echo "<td>".$fila['apellido_paterno']."</td>";
    echo "<td>".$fila['apellido_materno']."</td>";
    echo "<td>".$fila['ci']."</td>";
    echo "<td>".$fila['direccion']."</td>";
    echo "<td>".$fila['fecha_de_nacimiento']."</td>";
    echo "</tr>";

}?> 
</table> 
</body> 
</html>

// cerrar la conexion
<?php
pg_close($conectar);
?>