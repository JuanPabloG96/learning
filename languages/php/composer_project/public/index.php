<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Config\Database;
use App\Controllers\ProductController;
use App\Core\Router;
use App\Middleware\JsonMiddleware;
use App\Middleware\LogMiddleware;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$db = new Database();
$conn = $db->getConnection();

$productController = new ProductController($conn);
$router = new Router();

// Agregar middlewares
$router->addMiddleware(new JsonMiddleware());
$router->addMiddleware(new LogMiddleware());

require __DIR__ . '/../src/Routes/api.php';
require __DIR__ . '/../src/Routes/protected.php';

echo $router->resolve();
