<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Config\Database;
use App\Controllers\ProductController;
use App\Core\Router;
use Dotenv\Dotenv;

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Manejar preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
  http_response_code(200);
  exit();
}

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$db = new Database();
$conn = $db->getConnection();

$productController = new ProductController($conn);
$router = new Router();

require __DIR__ . '/../src/Routes/api.php';

echo $router->resolve();
