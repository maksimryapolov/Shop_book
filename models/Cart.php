<?php
    class Cart 
    {
        static public function addProduct($idProduct)
        {
            $idProduct = (int) $idProduct;
            //вспомогательный массив для хвранения продуктов в корзине
            $listProduct = array();

            //если в масиве сессии есть массив продукт, то кладем в наш вспомогательный массив
            if(isset($_SESSION['product'])) {
                $listProduct = $_SESSION['product'];
            } 

            //если в массиве есть элемент с таким ключом, добавляем +1 товар, иначе просто присваем товар в кол-во 1
            if(array_key_exists($idProduct, $listProduct)) {
                $listProduct[$idProduct]++;
            } else {
                $listProduct[$idProduct] = 1;
            }

            //кладем в наш массив сессии все товары
            $_SESSION['product'] = $listProduct;
        }

        static public function amountOfGoods()
        {
            $count = 0;
            if(isset($_SESSION['product'])) {

                foreach($_SESSION['product'] as $key => $value) {
                    $count += $value;
                }
                return $count;
            } else {
                return  $count;
            }
        }

        static public function delete($id) {

            if($_SESSION['product']) {
                unset($_SESSION['product'][$id]);
            }
        }

        static public function reduce($id) 
        {
            // var_dump($_SESSION['product'][$id] > 1); die;
            if($_SESSION['product'] && $_SESSION['product'][$id] > 1) {
                $_SESSION['product'][$id]--;
            } else {
                return false;
            }
        }

        static public function clear()
        {
            if($_SESSION['product']) {
                unset($_SESSION['product']);
            }
        }
    }
?>