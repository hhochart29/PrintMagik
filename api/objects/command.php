<?php

class Command
{
    private $conn;

    public function __construct(PDO $db)
    {
        $this->conn = $db;
    }

    public function read($id_command)
    {
        $request = 'SELECT * FROM command WHERE id = :id';
        $stmt    = $this->conn->prepare($request);
        $stmt->execute(
            array(
                'id' => $id_command,
            )
        );

        return $stmt;
    }

    public function readAllByUser($user_id)
    {
        $request = 'SELECT * FROM command WHERE user_id = :user_id';
        $stmt    = $this->conn->prepare($request);
        $stmt->execute(
            array(
                'user_id' => $user_id,
            )
        );

        return $stmt;
    }

    public function create($user_id, $status, $adress, $products)
    {
        $query  = "INSERT INTO command(user_id, status, adress)
                VALUES (:user_id, :status, :adress)";
        $stmt   = $this->conn->prepare($query);
        $res    = $stmt->execute(
            array(
                'user_id' => $user_id,
                'status'  => $status,
                'adress'  => $adress,
            )
        );
        $lastid = $this->conn->lastInsertId();

        foreach ($products as $product) {

            $query2 = "INSERT INTO command_product(command_id, product_id, quantity) 
                      VALUES (:command_id, :product_id, :quantity)";
            $stmt2  = $this->conn->prepare($query2);
            $res2   = $stmt2->execute(
                array(
                    'command_id' => $lastid,
                    'product_id' => $product['id'],
                    'quantity'   => $product['quantity'],
                )
            );
        }
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteByCommandId($id)
    {
        $query = "DELETE FROM command WHERE id = :id";
        $stmt  = $this->conn->prepare($query);
        $res   = $stmt->execute(
            array(
                'id' => $id,
            )
        );

        $query2 = "DELETE FROM command_product WHERE command_id = :id";
        $stmt2  = $this->conn->prepare($query2);
        $res2   = $stmt2->execute(
            array(
                'command' => $id,
            )
        );

        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function updateStatus($id, $status)
    {
        $query = "UPDATE command SET status = :status WHERE id = :id";
        $stmt  = $this->conn->prepare($query);
        $res   = $stmt->execute(
            array(
                'id'     => $id,
                'status' => $status,
            )
        );
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

}