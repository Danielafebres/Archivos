

<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "archivos");

// Comprobar si la conexión fue exitosa
if (mysqli_connect_errno()) {
  echo "Error al conectar a la base de datos: " . mysqli_connect_error();
  exit();
}
$conexion->set_charset("utf8mb4");
// Consulta para obtener los datos de la tabla
$query = "SELECT * FROM zapatos";

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

// Crear un array para almacenar los datos
$datos = array();

// Recorrer los resultados y agregarlos al array
while ($fila = mysqli_fetch_assoc($resultado)) {
  $datos[] = $fila;
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

// Exportar los datos en el formato seleccionado por el usuario
$tipo_archivo = $_POST['tipo_archivo'];

if ($tipo_archivo == 'json') {
  header('Content-Type: application/json');
  header('Content-Disposition: attachment; filename="datos.json"');
  echo json_encode($datos);

  
} elseif ($tipo_archivo == 'csv') {
  header('Content-Type: text/csv');
  header('Content-Disposition: attachment; filename="datos.csv"');
  $salida = fopen('php://output', 'w');
  foreach ($datos as $fila) {
    fputcsv($salida, $fila);
  }
  fclose($salida);
} elseif ($tipo_archivo == 'txt') {
  header('Content-Type: text/plain');
  header('Content-Disposition: attachment; filename="datos.txt"');
  // Encabezado de la tabla
  echo "Código\tTipo\tModelo\tMarca\tTalla\tPrecio".PHP_EOL;
  
  // Datos de la tabla
  foreach ($datos as $fila) {
    echo $fila['codigo'] . "\t" . $fila['tipo'] . "\t" . $fila['modelo'] . "\t" . $fila['marca'] . "\t" . $fila['talla'] . "\t" . $fila['precio'] . PHP_EOL;
  }
} else {
  echo "Tipo de archivo no válido";
}
?>