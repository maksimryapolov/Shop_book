<?php

    class CategoryController 
    {
        static public function actionIndex () 
        {

            $categories = array();
            $categories = Category::getCategoryList();

            $products = array();
            $products = Products::getListProduct(12);

            require_once ROOT . "/view/catalog/index.php";
            return true;
        }

        static public function actionCategory ($category_id, $page=1) 
        {

            $categories = array();
            $categories = Category::getCategoryList();


            $itemCategory = Products::getLitsByCategory($category_id, $page);
            $total = Products::getTotalProducts($category_id);

            $pagination = new Pagination($total, $page, Products::SHOW_BY_DEFAULT, 'page-');

            require_once (ROOT . "/view/catalog/item.php");
            return true;
        }
    }
?>