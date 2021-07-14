<?php
require __DIR__ . '/vendor/autoload.php';

use App\Controller\ProductController;
use App\Model\DBConnect;

$dbconnect = new DBConnect();
$controller = new ProductController();
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] :null;
include_once 'app/View/backend/layouts/header.php';
try {
    switch ($page){
        case 'product-list':
            $controller->showAllProducts();
            break;
        case 'create-product':
            $controller->createProduct();
            break;
        case 'delete-product':
            $controller->deleteProduct();
            break;
        case 'update-product':
            $controller->updateProduct();
            break;
        default:
            $controller->showAllProducts();
    }
} catch (Exception $exception) {
    echo $exception->getMessage();
}
include_once 'app/View/backend/layouts/footer.php';
