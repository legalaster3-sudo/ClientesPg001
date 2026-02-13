<?php
require_once'conexionpg.php';

//Verificar si se ha enviado el formulario
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $nombre_cliente = $_POST['nombre_cliente'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $ci = $_POST['ci'];
    $direccion = $_POST['direccion'];
    $fecha_de_nacimiento = $_POST['fecha_de_nacimiento'];
    //Consulta SQL para insertar datos
    $sql = "INSERT INTO clientes(nombres, apellido_paterno, apellido_materno, ci, direccion, fecha_de_nacimiento) VALUES('$nombre_estudiante','$apellido_paterno', '$apellido_materno','$ci', '$direccion', '$fecha_de_nacimiento')";

    //Ejecutar la consulta
    if (pg_query($conectar, $sql)) {
        echo "<p>Cliente agregado correctamente.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . pg_last_error($conectar);
    }
}
pg_close($conectar);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Clientes</title>
     <link rel="stylesheet"href="misestilos.css">
</head>
<body>
    <h2>Adicionar Nuevo Clientes</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="nombre_cliente">Nombre Cliente:</label><br>
        <input type="text" id="nombre_cliente" name="nombre_cliente" required><br><br>

        <label for="apellido_paterno">Apellido Paterno:</label><br>
        <input type="text" id="apellido_paterno" name="apellido_paterno" required><br><br>

        <label for="apellido_materno">Apellido Materno:</label><br>
        <input type="text" id="apellido_materno" name="apellido_materno" required><br><br>

        <label for="ci">CI:</label><br>
        <input type="number" id="ci" name="ci" required><br><br>

        <label for="direccion">Direccion:</label><br>
        <input type="text" id="direccion" name="direccion" required><br><br>
        
        <label for="rude">Rude:</label><br>
        <input type="text" id="rude" name="rude" required><br><br>
        
        <label for="fecha_de_nacimiento">Fecha Nacimiento:</label><br>
        <input type="date" id="fecha_de_nacimiento" name="fecha_de_nacimiento" required><br><br>
        

        <input type="submit" values="Adicionar Clientes">
    </form>
    <br>
    <a href="clientes.php">Ver lista de clientes</a>
</body>
</html>