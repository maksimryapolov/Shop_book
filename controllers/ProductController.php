<?php
    class ProductController 
    {
        static public function actionView($id)
        {
            $categories = array();
            $categories = Category::getCategoryList();

            $productItem = Products::getItemProduct($id);

            require_once(ROOT . "/view/product/view.php");

            return true;
        }
    }

?>