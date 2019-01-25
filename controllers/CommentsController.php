<?php
    class CommentsController
    {
        
        public static function actionIndex()
        {
            $userId = false;
            $listComment = array();
            $errors = false;
            $userGuest = User::isGuest();
            $listComment = Comment::getComment();

            $title = "";
            $comment = "";

            if(isset($_POST['button']))  {

                if(!$userGuest) {
                    $userId = User::checkLogged();
                } else {
                    header ("Location: /user/login/");
                }
    
                $title = $_POST["title"];
                $comment = trim(htmlspecialchars($_POST['comment']));
                $rating = $_POST["rating"];

                $rating = intval($rating);

                if(!User::checkTitleComment($title)) {
                    $errors[] = "слишком короткий заголовок"; 
                }

                if(!User::checkMessageComment($comment)) {
                    $errors[] = "слишком короткий отзыв";
                }

                if($errors == false) {
                    // заносим в БД комментарий 
                    $result = Comment::addComment($userId, $comment, $title, $rating);
                    header("Location: /comments/");
                    exit;
                }
                
            }
           

           
            include ROOT . "/view/comment/index.php";
            return true;
        }

        public static function actionAddComment () 
        {
            // $errors = false;

            // if(isset($_POST['button']))  {

            //     $userId = User::checkLogged();
                

            //     $title = "";
            //     $comment = "";

            //     $title = $_POST["title"];
            //     $comment = trim(htmlspecialchars($_POST['comment']));
            //     $rating = $_POST["rating"];
            //     $rating = intval($rating);

            //     if(User::checkTitleComment($title)) {
                    
            //     }

            //     $result = Comment::addComment($userId, $comment, $title);

            // }
        }
    }
?>