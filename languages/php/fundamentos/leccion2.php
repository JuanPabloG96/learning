<?php

// Ejercicio 1:
function calcularPromedio($nums_array) {
  $suma = 0;
  foreach ($nums_array as $num) {
    $suma += $num;
  }
  return $suma / count($nums_array);
}

$nums = [8, 7, 9, 6, 10];

$promedio = calcularPromedio($nums);

echo $promedio;

// Ejercicio 2:
function esPalindromo($texto) {
  $left = 0;
  $right = strlen($texto) - 1;

  while ($left <= $right) {
    if ($texto[$left] == ' ') $left++;
    if ($texto[$right] == ' ') $right--;
    if (strtolower($texto[$left]) != strtolower($texto[$right])) {
      return false;
    }
    $left++;
    $right--;
  }
  return true;
}

$texto = "jamon";
if (esPalindromo($texto)) {
  echo "\nEl string $texto es palindromo";
} else {
  echo "\nEl string $texto no es palindromo";
}

// Ejercicio 3
function filtrarPorPrecio($productos, $precioMaximo) {
  return array_filter($productos, function ($producto) use ($precioMaximo) {
    return $producto["precio"] <= $precioMaximo;
  });
}

$productos = [
  ["nombre" => "Mouse", "precio" => 250],
  ["nombre" => "Teclado", "precio" => 800],
  ["nombre" => "Monitor", "precio" => 3500],
  ["nombre" => "Cable USB", "precio" => 50]
];

$productosFiltrados = filtrarPorPrecio($productos, 650);

echo "\nLos productos con un precio maximo de 650 son: ";
print_r($productosFiltrados);

// Ejercicio 4:
function generarPassword($longitud) {
  $caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()";
  $maxIndex = strlen($caracteres) - 1;
  $password = "";

  for ($i = 0; $i < $longitud; $i++) {
    $indice = rand(0, $maxIndex);
    $password .= $caracteres[$indice];
  }

  return $password;
}

$password = generarPassword(20);

echo "Contraseña generada: $password";
