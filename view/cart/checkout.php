<?php require ROOT . "/view/layouts/header.php" ?>
    <div class="text-center">
        <?php if($result): ?>
            <span class="completion_info">спасибо вашь заказ принят в обработку</span>
        <?php else: ?>
            <div class="login_form">
                <div class="h3 font-weight-normal login_form-title">Оформление заказа</div>
                    <p class="alert alert-success checkout_title-result"><?php echo " Количество товаров $itemQuantity на сумму $priceTotal " ?></p>
                    
                    <form action="" method="post">
                        <div class="from-group">
                            <input id="exampleInputLogin1" class="form-control" type="text" name="name" placeholder="Логин" value="<?php echo $userName; ?>">
                        </div>
                        <div class="from-group">
                            <input id="exampleInputEmail1" class="form-control" type="tel" name="number" placeholder="Номер телефона">
                        </div>
                        <input type="submit" name="submit" class="btn btn-outline-warning">
                    </form>

            <?php endif ?>
        </div>
    </div>
    
<?php require ROOT . "/view/layouts/footer.php" ?>

    </body>
</html>