<?php

namespace App\Models;

use PDO;

class Product {
  private $id;
  private $name;
  private $price;
  private $stock;
  private $conn;

  public function __construct($conn) {
    $this->conn = $conn;
  }

  // Getters
  public function getId() {
    return $this->id;
  }
  public function getName() {
    return $this->name;
  }
  public function getPrice() {
    return $this->price;
  }
  public function getStock() {
    return $this->stock;
  }

  // Setters
  public function setId($id) {
    $this->id = $id;
  }
  public function setName($name) {
    $this->name = $name;
  }
  public function setPrice($price) {
    $this->price = $price;
  }
  public function setStock($stock) {
    $this->stock = $stock;
  }

  // CRUD Methods
  public function create() {
    $query = "INSERT INTO products (name, price, stock) VALUES (:name, :price, :stock)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":price", $this->price);
    $stmt->bindParam(":stock", $this->stock);
    return $stmt->execute();
  }
  public function readAll() {
    $query = "SELECT * FROM products";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }
  public function readById($id) {
    $query = "SELECT * FROM products WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    return $product;
  }
  public function update() {
    $query = "UPDATE products SET name = :name, price = :price, stock = :stock WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":price", $this->price);
    $stmt->bindParam(":stock", $this->stock);
    $stmt->bindParam(":id", $this->id);
    return $stmt->execute();
  }
  public function delete($id) {
    $query = "DELETE FROM products WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $id);
    return $stmt->execute();
  }
}
