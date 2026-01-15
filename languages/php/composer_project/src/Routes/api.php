<?php

$router->get('/api/products', function () use ($productController) {
  echo $productController->index();
});

$router->get('/api/products/{id}', function ($id) use ($productController) {
  echo $productController->show($id);
});

$router->post('/api/products', function () use ($productController) {
  echo $productController->store();
});

$router->put('/api/products/{id}', function ($id) use ($productController) {
  echo $productController->update($id);
});

$router->delete('/api/products/{id}', function ($id) use ($productController) {
  echo $productController->destroy($id);
});
