<?php
// маршруты, ЧПУ
return array (
    'product/([0-9]+)' => 'product/view/$1', // просмотр одного товара
    'check_in' => 'user/register', // регистрация 
    
    'category/([3-6]+)/page-([0-9]+)' => 'category/category/$1/$2', // категория и страница pagination
    'category/([3-6]+)' => 'category/category/$1', // просмотр одной категории

    'catalog' => 'category/index', // каталог товаров
    'cart/add/([0-9]+)' => 'cart/add/$1', // добавить в корзину товар
    'cart/delete/([0-9]+)' => 'cart/delete/$1', // удалить товар
    'cart/reduce/([0-9]+)' => 'cart/reduce/$1', // уменьшить товар на 1
    'cart/checkout' => "cart/checkout", // обработка заказа
    'cart' => 'cart/index', // корзина спсок добавленных товаров 
   


    'cabinet/edit' =>'cabinet/edit', // редактирование данных
   'cabinet' => 'cabinet/index', //личный кабинет
   

    'user/login' => 'user/login', // вход на сайт
    'user/logout' => 'user/logout', // выход 

    'index ' => 'site/index', // главная
);
?>