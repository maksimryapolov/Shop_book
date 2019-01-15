<?php
    class CartController 
    {
        static public function actionIndex()
        {
            $listCategory = Category::getCategoryList();
            // Список товаров из сессии
            $productsId = Products::getIdProducts();

            $listProduct = array();
            $priceTotal = 0;
            // если список есть...
            if ($productsId) {
                // получаем ID товаров

                $productsKeys = array_keys($productsId);
                // плучаем все товары по ID
                $listProduct = Products::getProductsById($productsKeys);
   
                // общая сумма товаров
                $priceTotal = Products::getTotalPrice($listProduct);
                // кол-во товаров
                $itemQuantity = Cart::amountOfGoods();

            }
            require_once ROOT . '/view/cart/index.php';
            return true;
        }

        static public function actionDelete($id)
        {

            Cart::delete($id);
            header("Location: /cart/");
        }

        static public function actionReduce($id) 
        {
            Cart::reduce($id);
            header("Location: /cart/");
        }

        static public function actionAdd($id)
        {

            Cart::addProduct($id);

            $referer = $_SERVER['HTTP_REFERER'];

            header("Location: $referer");
            return true;
        }
        static public function actionCheckout()
        {
            $result = false;
            $listProduct = array();
            $productsId = Products::getIdProducts(); 

            if(isset($_POST['submit'])) {

                $userName = $_POST['name'];
                $userPhone = $_POST['number'];

                $errors = false;
                
                if(User::checkEmail($userName)) {
                    $errors[] = "Неверное имя";
                }
                if(!User::checkNumber($userPhone)) {
                    $errors[] = "Неверный номер";
                }

                

                if($errors == false) {

                    if(User::isGuest()) {
                        $userId = false;
                    } else {
                        $userId = User::checkLogged();
                    }
                    
                    // Сохранить заказ в базе
                    $result = Order::save($userName, $userPhone, $userId,   $productsId);
                    Cart::clear();
                    
                    if($result) {
                        //отправить письмо на почту администратору
                    }
                } else {
                    $productsKeys = array_keys($productsId);
                    $listProduct = Products::getProductsById($productsKeys);
                    $priceTotal = Products::getTotalPrice($listProduct);
                    $itemQuantity = Cart::amountOfGoods();
                }

            } else {
               

                if(!$productsId) {
                    header('Location: /');
                } else {

                    $productsKeys = array_keys($productsId);
                    $listProduct = Products::getProductsById($productsKeys);
                    $priceTotal = Products::getTotalPrice($listProduct);
                    $itemQuantity = Cart::amountOfGoods();
                }

                $userName = false;

                if (User::isGuest()) {

                } else {
                    $userId =  User::checkLogged();
                    $user = User::getUserById($userId);
                    $userName = $user['name'];
                }
            }

            require_once ROOT . '/view/cart/checkout.php';
            return true;
        }
    }
?>