<?php

namespace App\Core;

class Router {
  private $routes = [];

  public function get($path, $callback) {
    $this->addRoute('GET', $path, $callback);
  }

  public function post($path, $callback) {
    $this->addRoute('POST', $path, $callback);
  }

  public function put($path, $callback) {
    $this->addRoute('PUT', $path, $callback);
  }

  public function delete($path, $callback) {
    $this->addRoute('DELETE', $path, $callback);
  }

  private function addRoute($method, $path, $callback) {
    $this->routes[] = [
      'method' => $method,
      'path' => $path,
      'callback' => $callback
    ];
  }

  public function resolve() {
    $method = $_SERVER['REQUEST_METHOD'];
    $uri = $_SERVER['REQUEST_URI'];

    // Remover query string
    $uri = strtok($uri, '?');

    foreach ($this->routes as $route) {
      // Convertir parámetros {id} a regex
      $pattern = preg_replace('/\{([a-zA-Z]+)\}/', '([0-9]+)', $route['path']);
      $pattern = "#^" . $pattern . "$#";

      if ($route['method'] === $method && preg_match($pattern, $uri, $matches)) {
        array_shift($matches); // Remover match completo
        return call_user_func_array($route['callback'], $matches);
      }
    }

    // Si no hay match, 404
    http_response_code(404);
    return json_encode(['error' => 'Route not found']);
  }
}
