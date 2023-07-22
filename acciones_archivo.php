<?php
// Obtener los datos del formulario
$nombre_archivo = $_POST['nombre_archivo'];
$nuevo_nombre_archivo = $_POST['nuevo_nombre_archivo'];
$accion = $_POST['accion'];

// Realizar la acción correspondiente
if ($accion == 'copiar') {
  copy($nombre_archivo, $nuevo_nombre_archivo);
  echo "Archivo copiado correctamente";
} elseif ($accion == 'renombrar') {
  rename($nombre_archivo, $nuevo_nombre_archivo);
  echo "Archivo renombrado correctamente";
} elseif ($accion == 'borrar') {
  unlink($nombre_archivo);
  echo "Archivo borrado correctamente";
} else {
  echo "Acción no válida";
}
?>