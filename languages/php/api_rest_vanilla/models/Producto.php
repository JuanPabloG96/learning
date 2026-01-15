<?php
class Producto {
  public $id;
  public $nombre;
  public $precio;
  public $stock;
  private $conn;

  public function __construct($conn){
    $this->conn = $conn;
  }
  public function crear(){
    $query = "INSERT INTO productos (nombre, precio, stock) VALUES (:nombre, :precio, :stock)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':nombre', $this->nombre);
    $stmt->bindParam(':precio', $this->precio);
    $stmt->bindParam(':stock', $this->stock);
    $stmt->execute();
  }
  public function leer(){
    $query = "SELECT * FROM productos";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    return $productos;
  }
  public function leerUno($id){
    $query = "SELECT * FROM productos WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $producto = $stmt->fetch(PDO::FETCH_ASSOC); 
    return $producto;
  }
  public function actualizar(){
    $query = "UPDATE productos SET nombre = :nombre, precio = :precio, stock = :stock WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':nombre', $this->nombre);
    $stmt->bindParam(':precio', $this->precio);
    $stmt->bindParam(':stock', $this->stock);
    $stmt->bindParam(':id', $this->id);
    $stmt->execute();
  }
  public function eliminar($id){
    $query = "DELETE FROM productos WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }
}
