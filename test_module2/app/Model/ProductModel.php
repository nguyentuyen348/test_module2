<?php
namespace App\Model;
use Product;

class ProductModel

{
    private $dbConnect;

    public function __construct()
    {
        $this->dbConnect = new DBConnect();
    }


    public function getAll()
    {
        try {
            $sql = "SELECT * FROM `products` ORDER BY `id` DESC";
            $stmt = $this->dbConnect->connect()->query($sql);
            $stmt->execute();
            return $this->convertAllToObj($stmt->fetchAll());
        } catch (\PDOException $exception) {
            die($exception->getMessage());
        }

    }


    public function getById($id)
    {
        try {
            $sql = "SELECT * FROM `products` WHERE `id`= $id";
            $stmt = $this->dbConnect->connect()->query($sql);
            $stmt->execute();
            return $this->convertToObject($stmt->fetch());
        } catch (\PDOException $exception) {
            die($exception->getMessage());
        }

    }


    public function create($request)
    {
        try {
            $sql = "INSERT INTO `products`(`product_name`,`brand`,`price`,`amount`,`status`,`date`) VALUES (?,?,?,?,?,?)";
            $stmt = $this->dbConnect->connect()->prepare($sql);
            $stmt->bindParam(1, $request['product-name']);
            $stmt->bindParam(2, $request['brand']);
            $stmt->bindParam(3, $request['price']);
            $stmt->bindParam(4, $request['amount']);
            $stmt->bindParam(5, $request['status']);
            $stmt->bindParam(6, $request['date']);
            $stmt->execute();
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
        }

    }


    public function update($request)
    {
        $product = $this->getById($_REQUEST['id']);
        try {
            $sql = "UPDATE `products` SET `product_name`=?,`brand`=?,`price`=?,`amount`=?,`status`=?,`date`=? WHERE `id`=" . $request['id'];
            $stmt = $this->dbConnect->connect()->prepare($sql);
            $stmt->bindParam(1, $request['product-name']);
            $stmt->bindParam(2, $request['brand']);
            $stmt->bindParam(3, $request['price']);
            $stmt->bindParam(4, $request['amount']);
            $stmt->bindParam(5, $request['status']);
            $stmt->bindParam(6, $request['date']);
            $stmt->execute();
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
        }

    }

    public function delete($id)
    {
        $sql = "DELETE FROM `products` WHERE `id` = $id";
        $stmt = $this->dbConnect->connect()->query($sql);
        $stmt->execute();
    }

    public function convertToObject($data): Product
    {
        $product = new Product($data['product_name'], $data['brand'], $data['price'], $data['amount'],$data['status'],$data['date']);
        $product->setId($data['id']);
        return $product;
    }

    public function convertAllToObj($data): array
    {
        $products = [];
        foreach ($data as $item) {
            $products[] = $this->convertToObject($item);
        }
        return $products;
    }
}