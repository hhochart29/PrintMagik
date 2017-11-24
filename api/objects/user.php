<?php

class User
{
    private $conn;

    public function __construct(PDO $db)
    {
        $this->conn = $db;
    }

    public function read($mail, $password)
    {

        $request = 'SELECT * FROM user WHERE mail = :mail AND password = :password';
        $stmt    = $this->conn->prepare($request);
        $stmt->execute(
            array(
                'mail'     => $mail,
                'password' => $password,
            )
        );

        return $stmt;
    }

    public function readAll()
    {
        $request = 'SELECT * FROM user';
        $stmt    = $this->conn->prepare($request);
        $stmt->execute();

        return $stmt;
    }

    public function create($mail, $password)
    {
        $query = "INSERT INTO user(mail, password, is_admin)
                VALUES (:mail, :password, :is_admin)";
        $stmt  = $this->conn->prepare($query);
        $res   = $stmt->execute(
            array(
                'mail'     => $mail,
                'password' => $password,
                'is_admin' => 0,
            )
        );
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($mail)
    {
        $query = "DELETE FROM user WHERE mail = :mail";
        $stmt  = $this->conn->prepare($query);
        $res   = $stmt->execute(
            array(
                'mail' => $mail,
            )
        );
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function update($mail, $password)
    {
        $query = "UPDATE user SET password = :password WHERE mail = :mail";
        $stmt  = $this->conn->prepare($query);
        $res   = $stmt->execute(
            array(
                'mail'     => $mail,
                'password' => $password,
            )
        );
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

}