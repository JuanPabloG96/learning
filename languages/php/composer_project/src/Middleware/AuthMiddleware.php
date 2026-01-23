<?php

namespace App\Middleware;

use App\Core\Middleware;

class AuthMiddleware implements Middleware {
  public function handle($next) {
    $headers = getallheaders();
    if (!isset($headers['Authorization'])) {
      http_response_code(401);
      echo json_encode(['error' => 'Unauthorized']);
      exit();
    }
    $authHeader = $headers['Authorization'];
    $parts = explode(' ', $authHeader);
    if (count($parts) !== 2 || $parts[0] !== 'Bearer') {
      http_response_code(401);
      echo json_encode(['error' => 'Invalid authorization format']);
      exit();
    }
    $token = $parts[1];
    if ($token !== 'secret-token-123') {
      http_response_code(403);
      echo json_encode(['error' => 'Forbidden']);
      exit();
    }
    return $next();
  }
}
