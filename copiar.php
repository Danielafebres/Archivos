<?php
if (!$_POST['nombre_archivo'] == "" and !$_POST['nuevo_nombre_archivo'] == "") {
	# code...

// Obtener los datos del formulario
$nombre_archivo = $_POST['nombre_archivo'];
$nuevo_nombre_archivo = $_POST['nuevo_nombre_archivo'];
copy($nombre_archivo, $nuevo_nombre_archivo);
  echo "Archivo copiado correctamente";}
  else{

  	echo "coloque una direccion valida";
  }
  
  ?>