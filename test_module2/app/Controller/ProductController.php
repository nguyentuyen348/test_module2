<?php
namespace App\Controller;

    use App\Model\ProductModel;
class ProductController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function showAllProducts()
    {
        $products = $this->productModel->getAll();
        include_once 'app/View/backend/product/list.php';
    }

    public function createProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include_once 'app/View/backend/product/create.php';
        } else {
            $this->productModel->create($_REQUEST);
            header('location:index.php');
        }
    }
    public function deleteProduct()
    {
        $id = $_REQUEST['id'];
        $this->productModel->delete($id);
        header('location:index.php');
    }

    public function updateProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_REQUEST['id'];
            $product = $this->productModel->getById($id);
            include_once 'app/View/backend/product/update.php';
        } else {
            $this->productModel->update($_REQUEST);
            header('location:index.php');
        }
    }
}
?>