<?php
class Products
{
    const SHOW_BY_DEFAULT = 1;

    static public function getListProduct($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);
        $db = Db::getConnection();
        
        $productList = array();

        $result =  $db->query('SELECT id, name, price, image, is_new FROM product WHERE status="1" ORDER BY id DESC LIMIT ' . $count);


        $i = 0;
        while($row = $result->fetch())
        {
            $productList[$i]['id'] =  $row["id"];
            $productList[$i]['name'] =  $row["name"];
            $productList[$i]['price'] =  $row["price"];
            $productList[$i]['image'] =  $row["image"];
            $productList[$i]['is_new'] =  $row["is_new"];
            $i++;
        }
        return $productList;
    }

    static public function getLitsByCategory($category_id = false, $page = 1)
    {
        if ($category_id) {
            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;


            $db = Db::getConnection();

            $categoryList = array();
            $result = $db->query("SELECT id, name, price, Author_name,  image, description  FROM product  WHERE category_id= " . $category_id . " LIMIT " . self::SHOW_BY_DEFAULT . " OFFSET " . $offset);


            $i = 0;
            while($row = $result->fetch() )
            {
                $categoryList[$i]['id'] =  $row['id'];
                $categoryList[$i]['name'] =  $row['name'];
                $categoryList[$i]['Author_name'] =  $row['Author_name'];
                $categoryList[$i]['image'] =  $row['image'];
                $categoryList[$i]['description'] =  $row['description'];
                $categoryList[$i]['price'] =  $row['price'];
                $i++;
            }
           
            return $categoryList;
        }
    }
     public static function getItemProduct($id_product) 
    {

        if ($id_product) {

            $db = Db::getConnection();

            $product = array();

            $result =  $db->query("SELECT id, name, price, Author_name, description, image, is_new FROM product WHERE id=" . $id_product);

            $i = 0;
            while($row = $result->fetch() )
            {
                $product[$i]['id'] =  $row['id'];
                $product[$i]['name'] =  $row['name'];
                $product[$i]['Author_name'] =  $row['Author_name'];
                $product[$i]['image'] =  $row['image'];
                $product[$i]['description'] =  $row['description'];
                $product[$i]['price'] =  $row['price'];
                $i++;
            }
            return $product;
        }
    }


    public static function getTotalProducts($id)
    {
        $db = Db::getConnection();

        $result = $db->query("SELECT count(id) as count  FROM product WHERE category_id = " . $id );

       $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        
        return $row['count'];
    }

    static public function getIdProducts()
    {
        if( isset($_SESSION['product'])) {
            return  $_SESSION['product'];
        } else {
            return false;
        }
    }
    static public function getProductsById($idProduct)
    {
        $db = Db::getConnection();
        $StringId = implode(',', $idProduct);
        $sql = "SELECT id, name, price FROM product WHERE id IN ($StringId)";

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while($row = $result->fetch() )
        {
            $products[$i]['id'] =  $row['id'];
            $products[$i]['name'] =  $row['name'];
            $products[$i]['price'] =  $row['price'];
            $i++;
        }
        return $products;
    }

    static public function getTotalPrice($listProduct)
    {
        $productsInCart =self::getIdProducts();
        $total = 0;

        if ($productsInCart) {
            foreach ($listProduct  as $item) {
               $total += $item['price'] * $productsInCart[$item['id']];
            }
        }
        return $total;
    }
}

?>