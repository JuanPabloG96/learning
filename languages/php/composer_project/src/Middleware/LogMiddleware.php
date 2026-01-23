<?php

namespace App\Middleware;

use App\Core\Middleware;

class LogMiddleware implements Middleware {
  public function handle($next) {
    $method = $_SERVER['REQUEST_METHOD'];
    $uri = $_SERVER['REQUEST_URI'];
    $timestamp = date('Y-m-d H:i:s');

    $log = "[$timestamp] $method $uri\n";
    $path_to_file = __DIR__ . '/../../logs/request.log';
    file_put_contents($path_to_file, $log, FILE_APPEND);

    return $next();
  }
}
