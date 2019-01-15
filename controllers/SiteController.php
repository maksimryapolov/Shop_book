<?php

class SiteController
{
   
    static public function actionIndex() 
    {
        $categories = array();
        $categories = Category::getCategoryList();

        $products = array();
        $products = Products::getListProduct(6);

        require_once(ROOT . "/view/cite/index.php");

        return true;
    }
}
?>