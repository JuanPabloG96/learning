<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

$method = $_SERVER["REQUEST_METHOD"];
$data = "../data/productos.json";

switch($method){
  case 'GET':
    if(!file_exists($data)) $respuesta = [];
    else{
      $contenido_json = file_get_contents($data);
      $respuesta = json_decode($contenido_json, true);
    }
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
    $id = uniqid();
    $input["id"] = $id;

    if(!file_exists($data)) $contenido = [];
    else {
      $contenido_json = file_get_contents($data);
      $contenido = json_decode($contenido_json, true);
    }

    array_push($contenido, $input);
    file_put_contents($data, json_encode($contenido, JSON_PRETTY_PRINT));

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
    if(!file_exists($data)){
      $respuesta = ["error" => "no hay productos guardados"];
      break;
    }
    $id = $input["id"];
    $contenido = json_decode(file_get_contents($data), true);
    $ids = array_column($contenido, 'id');
    if(!in_array($id, $ids)){
      $respuesta = ["error" => "el id no fue encontrado"];
      break;
    }
    $contenido = array_map(function ($contenido) use ($id, $input) {
      if($contenido["id"] == $id){
        $contenido["nombre"] = $input["nombre"];
        $contenido["precio"] = $input["precio"];
        $contenido["stock"] = $input["stock"];
      }
      return $contenido;
    }, $contenido);
    file_put_contents($data, json_encode($contenido, JSON_PRETTY_PRINT));
    $respuesta = ["mensaje" => "producto actualizado con exito"];
    break;

  case 'DELETE':
    $input = json_decode(file_get_contents("php://input"), true);
    if(!isset($input["id"])){
      http_response_code(400);
      $respuesta = ["error" => "campo de id vacio"];
      break;
    }
    if(!file_exists($data)){
      http_response_code(400);
      $respuesta = ["error" => "no hay productos guardados"];
      break;
    }
    $id = $input["id"];
    $contenido = json_decode(file_get_contents($data), true);
    $ids = array_column($contenido, 'id');
    if(!in_array($id, $ids)){
      http_response_code(400);
      $respuesta = ["error" => "el id no fue encontrado"];
      break;
    }
    $contenido = array_filter($contenido, function ($contenido) use ($id) { 
      return $contenido["id"] != $id;
    });
    file_put_contents($data, json_encode($contenido, JSON_PRETTY_PRINT));
    $respuesta = ["mensaje" => "producto eliminado con exito"];
    break;

  default:
    http_response_code(405);
    $respuesta = ["error" => "Método no permitido"];
    break;
}

echo json_encode($respuesta);
