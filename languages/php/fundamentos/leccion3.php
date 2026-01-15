<?php

// Ejercicio 1
function limpiarTexto($texto) {
  $texto = strtolower($texto);
  $texto = trim($texto);
  $texto = preg_replace('/\s+/', " ", $texto);
  return $texto;
}

$texto = "  jaMon  Con Ramona  si no talvez.";

$texto_limpio = limpiarTexto($texto);

echo "El texto limpio: $texto_limpio";

// Ejercicio 2
function extraerDominio($email) {
  return substr($email, strpos($email, "@") + 1);
}

$correo = "joedoe@example.com";
$dominio = extraerDominio($correo);

echo "\nDominio del $correo es: $dominio";

// Ejercicio 3
function arrayAJson($datos) {
  return json_encode($datos, JSON_PRETTY_PRINT);
}

$usuario = [
  "id" => 1,
  "nombre" => "María",
  "activo" => true,
  "tags" => ["admin", "premium"]
];

$json_data = arrayAJson($usuario);

echo "\nDatos en formato json: \n$json_data";

// Ejercicio 4
function calcularEdad($fechaNacimiento) {
  $tiempo_actual = time();
  $tiempo_nacimiento = strtotime($fechaNacimiento);

  $edad_segundos = $tiempo_actual - $tiempo_nacimiento;
  $segundos_anuales = 60 * 60 * 24 * 365.25;
  $edad = floor($edad_segundos / $segundos_anuales);

  return $edad;
}

$fecha = "1962-07-14";

$edad = calcularEdad($fecha);

echo "\nLa edad de la fecha [$fecha] es: $edad";
