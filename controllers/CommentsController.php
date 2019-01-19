<?php
    class CommentsController
    {
        public static function actionIndex()
        {
            
            $listComment = Comment::getComment();
            
            include ROOT . "/view/comment/index.php";
            return true;
        }
    }
?>