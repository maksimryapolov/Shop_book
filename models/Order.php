<?php 
    class Order 
    {
        static public function save($userName, $userPhone, $userId,   $productsId) 
        {
            $productsId = json_encode($productsId);

            $db = Db::getConnection();

            $sql = 'INSERT INTO product_order (userName, user_phone, userId, products) VALUES (:userName, :userPhone, :userId, :productsId)';
            $result = $db->prepare($sql);

            $result->bindParam(':userName', $userName, PDO::PARAM_STR);      
            $result->bindParam(':userPhone', $userPhone, PDO::PARAM_STR); 
            $result->bindParam(':userId', $userId, PDO::PARAM_STR);
            $result->bindParam(':productsId', $productsId, PDO::PARAM_STR);

            return $result->execute();
        }
    }