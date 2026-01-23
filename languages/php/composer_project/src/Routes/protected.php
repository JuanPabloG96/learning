<?php

use App\Middleware\AuthMiddleware;

$authMiddleware = new AuthMiddleware();

$router->get('/api/admin/stats', function () use ($productController, $authMiddleware) {
  return $authMiddleware->handle(function () use ($productController) {
    return $productController->stats();
  });
});
