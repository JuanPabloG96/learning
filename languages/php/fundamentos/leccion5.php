<?php

// Ejercicio 1
function guardarLog($mensaje) {
  date_default_timezone_set("America/Ciudad_Juarez");
  $fecha_hora = date("d-m-Y H:i:s");
  $contenido = "[$fecha_hora] " . $mensaje . "\n";

  $ruta_archivo = "archivos/log.txt";

  file_put_contents($ruta_archivo, $contenido, FILE_APPEND);
}

$mensaje = "Mensaje de prueba de log";
guardarLog($mensaje);

// Ejercicio 2
class Tarea {
  public $titulo;
  public $descripcion;

  public function __construct($titulo, $descripcion) {
    $this->titulo = $titulo;
    $this->descripcion = $descripcion;
  }
}

class GestorTareas {
  private $file;

  public function __construct() {
    $this->file = "archivos/tareas.json";
  }

  public function guardar($tareas) {
    file_put_contents($this->file, json_encode($tareas, JSON_PRETTY_PRINT));
  }
  public function cargar() {
    if (!file_exists($this->file)) {
      return [];
    }
    $json = file_get_contents($this->file);
    return json_decode($json, true);
  }
  public function agregar($tarea) {
    $tareas_guardadas = $this->cargar();
    array_push($tareas_guardadas, $tarea);
    file_put_contents($this->file, json_encode($tareas_guardadas, JSON_PRETTY_PRINT));
  }
}

$gestor = new GestorTareas();
$tarea1 = new Tarea("Tarea 1", "descripcion de la tarea 1");
$tarea2 = new Tarea("Tarea 2", "descripcion de la tarea 2");

$gestor->agregar($tarea1);
$gestor->agregar($tarea2);

$tareas_cargadas = $gestor->cargar();
echo "\nTareas: " . json_encode($tareas_cargadas, JSON_PRETTY_PRINT);

$lista_tareas = [
  new Tarea("Tarea 3", "descripcion tarea 3"),
  new Tarea("Tarea 4", "descripcion tarea 4")
];

$gestor->guardar($lista_tareas);

$tareas_cargadas = $gestor->cargar();
echo "\nTareas: " . json_encode($tareas_cargadas, JSON_PRETTY_PRINT);

// Ejercicio 3
require_once "leccion4.php";

$_POST = ["nombre" => "Juan", "email" => "juan@test.com", "edad" => "25"];
$usuarios = [];
$save_file = "archivos/usuarios.json";

if (!isset($_POST['nombre']) || !isset($_POST['email']) || !isset($_POST['edad'])) {
  echo "Faltan campos";
  exit;
} else if (!Validador::esEmail($_POST['email'])) {
  echo "Email inválido";
  exit;
} else {
  if (file_exists($save_file)) {
    $json_users = file_get_contents($save_file);
    $usuarios = json_decode($json_users, true);
  }
  array_push($usuarios, $_POST);
  file_put_contents("archivos/usuarios.json", json_encode($usuarios, JSON_PRETTY_PRINT));
  echo "Usuario guardado con exito.";
}

// Ejercicio 4 
function leerCSV($archivo) {
  $file = fopen($archivo, 'r');
  $headers = fgetcsv($file, 0, ',', '"', '\\');
  $res = [];

  while ($fila = fgetcsv($file, 0, ',', '"', '\\')) {
    $res[] = array_combine($headers, $fila);
  }
  fclose($file);
  return $res;
}

$archivo = "archivos/productos.csv";
$datos = leerCSV($archivo);

echo "\nDatos guardados en el csv: \n";
echo json_encode($datos, JSON_PRETTY_PRINT);
