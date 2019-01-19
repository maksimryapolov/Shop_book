<?php
    class CommentsController
    {
        public static function actionIndex()
        {
            $listComment = array();
            $listComment = Comment::getComment();

            if(isset($_POST['button'])) {
                echo '123'; die;
            }


            include ROOT . "/view/comment/index.php";
            return true;
        }
    }
?>