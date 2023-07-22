
<?php
if (!$_POST['nombre_archivo'] == "" and !$_POST['nuevo_nombre_archivo'] == "") {
// Obtener los datos del formulario
$nombre_archivo = $_POST['nombre_archivo'];
$nuevo_nombre_archivo = $_POST['nuevo_nombre_archivo'];
rename($nombre_archivo, $nuevo_nombre_archivo);
  echo "Archivo renombrado o movido correctamente"; }

  ?>