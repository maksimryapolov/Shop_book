<?php

class User 
{
    // Занести пользователя в таблицу
    static public function register($name, $email, $password)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)'; 
        $result = $db->prepare($sql);

        $result->bindParam(':name', $name, PDO::PARAM_STR);      
        $result->bindParam(':email', $email, PDO::PARAM_STR); 
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return  $result->execute();
    }

    static public function checkName($name)
    {
        if (strlen($name) >= 3) {
            return true;
        }
        return false;
    }

    static public function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    static public function checkPassword($password) 
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }
    static public function checkNumber($number) {
        $numberTemp = '/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/';

        if( preg_match( $numberTemp, $number)) {
            return true;
        }
        return false;
    }

    static public function checkTitleComment($title)
    {
        if (strlen($title) >= 5) {
            return true;
        }
        return false;
    }

    static public function checkMessageComment($message)
    {
        if (strlen($message) >= 5) {
            return true;
        }
        return false;
    }

    //метод подготовленного запроса Email
    static public function checkEmailExists($email) {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);        
        $result->execute();

        //если в таблице есть такой email вернем true
        if  ( $result->fetchColumn() ) { 
            return true;
        }
        return false;
    }

    static public function CheckUserData($email, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM users WHERE email = :email AND password = :password';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR); 
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();

        if ($user) {
            return $user['id'];
        }
        return false;
    }

    static public function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    static public function isGuest() 
    {

        if (isset($_SESSION['user'])) {
            return false;
        } 
        return true;
    }

    static public function checkLogged()
    {

        if($_SESSION['user']){
            return $_SESSION['user'];
        }
        header ("Location: /user/login/");
    }
    static public function getUserById($id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM users WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR); 
        $result->execute();
        return $user = $result->fetch(PDO::FETCH_ASSOC);
    }
    static public function edit($id, $name, $password)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE users SET name = :name, password = :password WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR); 
        $result->bindParam(':name', $name, PDO::PARAM_STR); 
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }
}
?>