<?php

require_once 'config/Database.php';

$db = new Database();
$connection = $db->getConnection();

if($connection){
  echo "Conexion con base de datos exitosa";
}
else {
  echo "Fallo la conexion a la base de datos";
}
