<?php

namespace App\Core;

class Router {
  private $routes = [];
  private $middlewares = [];

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

  public function addMiddleware($middleware) {
    $this->middlewares[] = $middleware;
  }

  public function resolve() {
    $pipeline = function () {
      $method = $_SERVER['REQUEST_METHOD'];
      $uri = strtok($_SERVER['REQUEST_URI'], '?');

      foreach ($this->routes as $route) {
        $pattern = preg_replace('/\{([a-zA-Z]+)\}/', '([0-9]+)', $route['path']);
        $pattern = "#^" . $pattern . "$#";

        if ($route['method'] === $method && preg_match($pattern, $uri, $matches)) {
          array_shift($matches);
          return call_user_func_array($route['callback'], $matches);
        }
      }

      http_response_code(404);
      return json_encode(['error' => 'Route not found']);
    };

    foreach (array_reverse($this->middlewares) as $middleware) {
      $pipeline = function () use ($middleware, $pipeline) {
        return $middleware->handle($pipeline);
      };
    }

    return $pipeline();
  }
}
