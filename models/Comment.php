<?php
    class Comment
    {
        const DEFAULT_RAITNG = 1;

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
               $comment[$i]["user_name"] = User::getUserById($row["user_id"])['name'];
               $comment[$i]["rating"] = Comment::setTheClassName($row["rating"]);
               $i++;
            }
            return $comment;
        }

        static public function addComment($user_id, $comment, $title,  $rating = self::DEFAULT_RAITNG) 
        {
            $db = Db::getConnection();
            $sql = 'INSERT INTO `comment` ( `user_id`, `content`, `title`, `rating`) VALUES (:user_id, :comment, :title, :rating)';

            $result = $db->prepare($sql);
            $result->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $result->bindParam(':comment', $comment, PDO::PARAM_STR);
            $result->bindParam(':title', $title, PDO::PARAM_STR);
            $result->bindParam(':rating', $rating, PDO::PARAM_STR);

            return $result->execute();

        }
        static private function setTheClassName($rating) 
        {
            $listRating = array(
                0 => "danger",
                1 => "dark",
                2 => "success"
            );
            foreach($listRating as $key => $className) {
                    if($key == $rating)
                return $className;
            }
        }
    }
?>