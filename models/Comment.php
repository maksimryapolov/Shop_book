<?php
    class Comment
    {
        public static function getComment() 
        {
            $db = Db::getConnection();
            
            $sql = "SELECT * from comment";
            $result = $db->prepare($sql);

            $result->execute();
            $comment = array();
            $i = 0;
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
               $comment[$i] = $row;
               $i++;
            }
            
            return $comment;  
        }
    }
?>