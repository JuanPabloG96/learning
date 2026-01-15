<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

require __DIR__ . '/../config/Database.php';
require __DIR__ . '/../models/Producto.php';

$method = $_SERVER["REQUEST_METHOD"];
$db = new Database();
$conn = $db->getConnection();
$productos = new Producto($conn);

switch($method){
  case 'GET':
    $respuesta = $productos->leer();
    break;

  case 'POST':
    $input = json_decode(file_get_contents("php://input"), true);
    if(!isset($input["nombre"]) || !isset($input["precio"]) || !isset($input["stock"])){
      http_response_code(400);
      $respuesta = ["error" => "campos vacios"];
      break;
    }
    if($input["precio"] <= 0 || $input["stock"] < 0){
      http_response_code(400);
      $respuesta = ["error" => "El precio no puede ser menor a 0 y el stock no debe ser negativo"];
      break;
    }
    $productos->nombre = $input["nombre"];
    $productos->precio = $input["precio"];
    $productos->stock = $input["stock"];
    $productos->crear();
    http_response_code(201);
    $respuesta = ["mensaje" => "Producto agregado con exito"];
    break;

  case 'PUT':
    $input = json_decode(file_get_contents("php://input"), true);
    if(!isset($input["id"]) || !isset($input["nombre"]) || !isset($input["precio"]) || !isset($input["stock"])){
      http_response_code(400);
      $respuesta = ["error" => "campos vacios"];
      break;
    }
    $existe = $productos->leerUno($input["id"]);
    if(!$existe) {
        http_response_code(404);
        $respuesta = ["error" => "Producto no encontrado"];
        break;
    }
    $productos->id = $input["id"];
    $productos->nombre = $input["nombre"];
    $productos->precio = $input["precio"];
    $productos->stock = $input["stock"];
    $productos->actualizar();

    $respuesta = ["mensaje" => "producto actualizado con exito"];
    break;

  case 'DELETE':
    $input = json_decode(file_get_contents("php://input"), true);
    if(!isset($input["id"])){
      http_response_code(400);
      $respuesta = ["error" => "campo de id vacio"];
      break;
    }
    $existe = $productos->leerUno($input["id"]);
    if(!$existe) {
        http_response_code(404);
        $respuesta = ["error" => "Producto no encontrado"];
        break;
    }
    $productos->eliminar($input["id"]);
    $respuesta = ["mensaje" => "producto eliminado con exito"];
    break;

  default:
    http_response_code(405);
    $respuesta = ["error" => "Método no permitido"];
    break;
}

echo json_encode($respuesta);
