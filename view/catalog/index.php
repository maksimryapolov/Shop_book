<?php require ROOT . "/view/layouts/header.php" ?>

        <div class="jumbotron">
            <div class="row">
                <div class="col-3">
                    <ul class="list-group container_category">
                        <?php foreach($categories as $item): ?>
                            <a href="/category/<?php echo $item["id"]?>">
                                <li class="list-group-item link-item">
                                    <?php echo $item['name']; ?>
                                </li>
                            </a>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="col-9">
                    <div class="container-fueld">
                        <div class="row">
                            <?php foreach($products as $item): ?>
                                <div class="col-4">
                                    <div class="card container_item">
                                        <img class="card-img-top card_img" src="<?php echo $item['image'] ?> " alt="Книга-<?php echo $item['name'] ?>">
                                        <div class="card-body">
                                            <h5 class="card-title card-title_margin">
                                                <a href="/product/<?php echo $item['id']; ?>">
                                                    <?php echo $item['name'] ?>
                                                </a>
                                            </h5>
                                            <a  href="/cart/add/<?php echo $item['id']; ?>" class="btn btn-primary btn_busket">В корзину</a>
                                            <div class="price">
                                                <b><?php echo $item['price'];?> ₽</b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>  

        <?php require ROOT . "/view/layouts/footer.php" ?>

    </body>
</html>