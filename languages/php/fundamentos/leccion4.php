<?php

// Ejercicio 1:
class CuentaBancaria {
  private $titular;
  private $saldo;

  public function __construct($titular, $saldo) {
    $this->titular = $titular;
    $this->saldo = $saldo;
  }

  public function depositar($cantidad) {
    $this->saldo += $cantidad;
    echo "Deposito realizado con exito.\n";
  }
  public function retirar($cantidad) {
    if ($cantidad <= $this->saldo) {
      $this->saldo -= $cantidad;
      echo "Retiro realizado con exito.\n";
    } else {
      echo "No hay suficiente saldo en la cuenta\n";
    }
  }
  public function getSaldo() {
    return $this->saldo;
  }
  public function getInfo() {
    echo "Titular de la cuenta: $this->titular\n";
    echo "Saldo de la cuenta: $this->saldo\n";
  }
}

$mi_cuenta = new CuentaBancaria("Juan Pablo", 1234.00);

echo "Saldo actual " . $mi_cuenta->getSaldo() . "\n";
$mi_cuenta->depositar(450);
echo "Saldo actual " .  $mi_cuenta->getSaldo() . "\n";

// Ejercicio 2
class Rectangulo {
  private $ancho;
  private $alto;

  public function __construct($ancho, $alto) {
    $this->ancho = $ancho;
    $this->alto = $alto;
  }

  public function calcularArea() {
    return $this->ancho * $this->alto;
  }
  public function calcularPerimetro() {
    return (2 * $this->ancho) + (2 * $this->alto);
  }
}

class Cuadrado extends Rectangulo {
  public function __construct($lado) {
    parent::__construct($lado, $lado);
  }
}

$cuadrado = new Cuadrado(16);
$area = $cuadrado->calcularArea();
$perimetro = $cuadrado->calcularPerimetro();

echo "El area del cuadrado es: $area\n";
echo "El perimetro del cuadrado es: $perimetro\n";

// Ejercicio 3
class Validador {
  public static function esEmail($texto) {
    if (!filter_var($texto, FILTER_VALIDATE_EMAIL)) {
      return false;
    }
    return true;
  }
  public static function esNumero($texto) {
    return is_numeric($texto);
  }
}

if (Validador::esEmail("hola@example.com")) {
  echo "Es un correo valido\n";
} else {
  echo "El correo no es valido\n";
}

if (Validador::esNumero("Jamon")) {
  echo "El valor ingresado es un numero\n";
} else {
  echo "El valor ingresado no es un numero\n";
}

// Ejercicio 4
class Carrito {
  private $lista;

  public function __construct() {
    $this->lista = [];
  }

  public function agregarProducto($nombre, $precio, $cantidad) {
    $producto = [
      "Nombre" => $nombre,
      "Precio" => $precio,
      "Cantidad" => $cantidad
    ];
    array_push($this->lista, $producto);
  }

  public function calcularTotal() {
    $total = 0;
    foreach ($this->lista as $producto) {
      $total += $producto["Precio"] * $producto["Cantidad"];
    }
    return $total;
  }

  public function obtenerProductos() {
    return json_encode($this->lista, JSON_PRETTY_PRINT);
  }
}

$carrito = new Carrito();
$carrito->agregarProducto("Laptop", 1345.99, 2);
$carrito->agregarProducto("PS5", 599.99, 1);
$total = $carrito->calcularTotal();

echo "Items en el carrito:\n";
echo $carrito->obtenerProductos() . "\n";
echo "Total: $total\n";
