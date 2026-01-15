<?php

// Ejercicio 1:
$nombre = "john";
$edad = 29;
$ciudad = "Ciudad Juarez";
$hobbies = ["tocar guitarra", "jugar videojuegos", "programar"];

echo "Mi nombre es $nombre, tengo $edad años, vivo en $ciudad y mis hobbies son $hobbies[0], $hobbies[1] y $hobbies[2].\n";

// Ejercicio 2:
$nums = [23, 56, 2, 12, 4];

foreach ($nums as $number) {
  if ($number > 10) {
    echo $number;
    echo "\n";
  }
}

// Ejercicio 3:
$producto = [
  "nombre" => "laptop",
  "precio" => 1299.99,
  "stock" => 3
];

if ($producto["stock"] > 0) {
  echo "Producto disponible\n";
};

// Ejercicio 4:
for ($i = 1; $i <= 20; $i++) {
  if ($i % 3 == 0 && $i % 5 == 0) {
    echo "FizzBuzz\n";
  } else if ($i % 3 == 0) {
    echo "Fizz\n";
  } else if ($i % 5 == 0) {
    echo "Buzz\n";
  }
};
