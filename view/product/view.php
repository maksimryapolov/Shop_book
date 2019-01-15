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

        <main class="col-8 view-item">
            <?php foreach($productItem as $item) : ?>
                <div class="view-item_block">
                    <img src="<?php echo $item['image'] ?>" alt="<?php echo $item['name'] ?>" style="width: 200px;">
                    <div class="view-item_name">
                        <h2><?php echo $item['name']?></h2>
                        <h4>Автор: <?php echo $item['Author_name'] ?></h4>
                        <div>Цена: <?php echo $item['price'] ?></div>
                        <div> <a class="btn btn-primary" href="/cart/add/<?php echo $item['id']; ?>">В корзину</a></div>
                    </div>
                </div>
                <p>
                    <div>
                        <b>Описание:</b>
                    </div> 
                        <?php echo $item['description'] ?>
                </p>
            <?php endforeach ?>
        </main>
    </div>
</div>

    <?php require ROOT . "/view/layouts/footer.php" ?>

    </body>
</html>