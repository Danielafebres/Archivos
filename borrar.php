
<?php
if (!$_POST['nombre_archivo'] == "") {
// Obtener los datos del formulario
$nombre_archivo = $_POST['nombre_archivo'];

 unlink($nombre_archivo);
  echo "Archivo borrado correctamente";
   } ?>