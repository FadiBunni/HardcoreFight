<?php
require_once dirname(__FILE__).'/../db.php';

class SignUp
{
    public function createUser($userName, $password, $email){
        try{


            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $LastLogin = date('Y-m-d H:i:s');

            $db = new Connection();

            $stmt = $db->prepare("INSERT INTO
                              users (id,Username,Password, LastLogin,Email, Created)
                              VALUES (:id, :UserName,:Password, :LastLogin, :Email, :Created)");

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':UserName', $userName);
            $stmt->bindParam(':Password', $hashedPassword);
            $stmt->bindParam(':LastLogin', $LastLogin);
            $stmt->bindParam(':Email', $email);
            $stmt->bindParam(':Created', $Created);

            $stmt->execute();
        }
        catch(PDOException $e){
            throw new PDOException($e);
        }

    }
}