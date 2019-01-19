<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Portfolio</title>

        <!-- <link rel="stylesheet" href="../../template/css/bootstrap.min.css"> -->
      
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="../../template/css/style.css">
    </head>
    <body>
        <ul class="nav bg_nav nav-block">

            <li class="nav-item">
                <a class="nav-link link-item" href="/">Главная</a>
            </li>
            <li class="nav-item">
                <a class="nav-link link-item" href="/catalog/">Каталог товаров</a>
            </li>
            <li class="nav-item">
                <a class="nav-link link-item" href="comments">Отзывы</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link " href="/">Блог</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">О Нас</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Контакты</a>
            </li> -->
            <li class="nav-item ">
                    <a class="nav-link link-item" href="/cart/">Корзина<span>(<?php echo Cart::amountOfGoods(); ?>)</span></a>
                </li>
            <?php if ( User::isGuest() ):  ?>
                <li class="nav-item">
                    <a class="nav-link link-item" href="/user/login/">Вход</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-item" href="/check_in/">Регистрация</a>
                </li>
                <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link link-item" href="/cabinet/">Аккаунт</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-item" href="/user/logout/">Выход</a>
                </li>
            <?php endif ?>
        </ul>

        <div class="header_index-bg-img jumbotron jumbotron-fluid">
            <h1 class="head_title">
                <span class="title-bg">ЧИТАЮЩИЙ</span>
            </h1>
            <p class="desc_title">
                <span class="title-bg description"> Книги — хороший способ поговорить с тем, с кем разговор невозможен</span>
            </p>
        </div>