<?php

class Product
{
    private $conn;

    public function __construct(PDO $db)
    {
        $this->conn = $db;
    }

    public function read($id)
    {
        $resquest = 'SELECT * FROM product WHERE id = :id';
        $stmt     = $this->conn->prepare($resquest);
        $stmt->execute(
            array(
                'id' => $id,
            )
        );

        return $stmt;
    }

    public function readAll()
    {
        $request = 'SELECT * FROM product';
        $stmt    = $this->conn->prepare($request);
        $stmt->execute();

        return $stmt;
    }

    public function create($name, $price, $image)
    {
        $query = "INSERT INTO product(name, price, image)
                VALUES (:name, :price, :image)";
        $stmt  = $this->conn->prepare($query);
        $res   = $stmt->execute(
            array(
                'name'     => $name,
                'price' => $price,
                'image' => $image,
            )
        );
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $query = "DELETE FROM product WHERE id = :id";
        $stmt  = $this->conn->prepare($query);
        $res   = $stmt->execute(
            array(
                'id' => $id,
            )
        );
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id, $name, $price, $image)
    {
        $query = "UPDATE product SET name = :name, price = :price, image = :image WHERE id = :id";
        $stmt  = $this->conn->prepare($query);
        $res   = $stmt->execute(
            array(
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'image' => $image
            )
        );
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

}