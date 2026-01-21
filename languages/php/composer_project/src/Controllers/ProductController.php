<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController {
  private $product;

  public function __construct($conn) {
    $this->product = new Product($conn);
  }

  public function index() {
    return json_encode($this->product->readAll(), JSON_PRETTY_PRINT);
  }
  public function show($id) {
    $product = $this->product->readById($id);
    if (!$product) {
      http_response_code(404);
      return json_encode(["error" => "product not found"], JSON_PRETTY_PRINT);
    }
    return json_encode($product, JSON_PRETTY_PRINT);
  }
  public function store() {
    $input = json_decode(file_get_contents('php://input'), true);

    if (!isset($input["name"]) || !isset($input["price"]) || !isset($input["stock"])) {
      http_response_code(400);
      return json_encode(["error" => "empty fields recived."], JSON_PRETTY_PRINT);
    }
    if ($input["price"] <= 0 || $input["stock"] < 0) {
      http_response_code(400);
      return json_encode(["error" => "price or stock values are not valid."], JSON_PRETTY_PRINT);
    }

    $this->product->setName($input["name"]);
    $this->product->setPrice($input["price"]);
    $this->product->setStock($input["stock"]);

    if ($this->product->create()) {
      http_response_code(201);
      return json_encode(["message" => "product created succesfully"], JSON_PRETTY_PRINT);
    } else {
      http_response_code(500);
      return json_encode(["error" => "error during product creation"], JSON_PRETTY_PRINT);
    }
  }
  public function update($id) {
    $input = json_decode(file_get_contents('php://input'), true);

    if (!isset($input["name"]) || !isset($input["price"]) || !isset($input["stock"])) {
      http_response_code(400);
      return json_encode(["error" => "empty fields recived."], JSON_PRETTY_PRINT);
    }
    $product_exist = $this->product->readById($id);
    if (!$product_exist) {
      http_response_code(404);
      return json_encode(["error" => "product not found"], JSON_PRETTY_PRINT);
    }

    $this->product->setId($id);
    $this->product->setName($input["name"]);
    $this->product->setPrice($input["price"]);
    $this->product->setStock($input["stock"]);

    if ($this->product->update()) {
      http_response_code(202);
      return json_encode(["message" => "product updated succesfully"], JSON_PRETTY_PRINT);
    } else {
      http_response_code(500);
      return json_encode(["error" => "error during product update"], JSON_PRETTY_PRINT);
    }
  }
  public function destroy($id) {
    $product_exist = $this->product->readById($id);
    if (!$product_exist) {
      http_response_code(404);
      return json_encode(["error" => "product not found"], JSON_PRETTY_PRINT);
    }

    if ($this->product->delete($id)) {
      http_response_code(202);
      return json_encode(["message" => "product deleted succesfully"], JSON_PRETTY_PRINT);
    } else {
      http_response_code(500);
      return json_encode(["error" => "error during product elimination"], JSON_PRETTY_PRINT);
    }
  }
}
