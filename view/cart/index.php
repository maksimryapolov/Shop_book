<?php require ROOT . "/view/layouts/header.php" ?>
<div class="container checkout-block">
    <div class="checkout-header__title">Корзина</div>
    <?php foreach ($listProduct as $item) : ?>
        <div class="goodsItemBlock">
            <h3><?php echo $item['name'] ?></h3>
            <p>Цена за один товар: <?php echo $item['price'] ?> </p>
            <p> Количество товаров: <?php echo $productsId[$item['id']] ?></p>
            <div class="checkout-correction">
                <div><a href="/cart/delete/<?php echo $item['id'] ?>" >Удалить</a></div>
                <div class="checkout-minus"><a class="<?php if($productsId[$item['id']] <= 1) :?> disabled <?php endif ?> btn btn-primary" href="/cart/reduce/<?php echo $item['id'] ?>" >уменьшить количество</a></div>
            </div>
        </div>
    <?php endforeach ?>


    <?php if ($priceTotal != 0) : ?>
    <p class="checkout-order-total">Общее количество товаров <?php echo $itemQuantity ?> на сумму <?php echo $priceTotal ?> руб. </p>
    <div>
        <a href="/cart/checkout/">Оформить заказ</a>
    </div>
    <?php else : ?>
        <div class="checkout_emptyt">
            <p class="checkout_empty-title">В вашей корзине пока нет товаров  <div><a href="/catalog/">Каталог товаров</a></div></p>
        </div>
    <?php endif ?>
</div>

<?php require ROOT . "/view/layouts/footer.php" ?>

    </body>
</html>