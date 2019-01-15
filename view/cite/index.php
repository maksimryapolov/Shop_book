<?php require ROOT . "/view/layouts/header.php" ?>

<div class="jumbotron">
    <div class="row">
        <div class="col-3">
            <ul class="list-group container_category">
                <?php foreach($categories as $item): ?>
                    <a href="category/<?php echo $item["id"]?>">
                        <li class="list-group-item link-item">
                            <?php echo $item['name']; ?>
                        </li>
                    </a>
                <?php endforeach ?>
            </ul>
        </div>
                
        <div class="col-9">
            <main class="my_content">
                <div class="container-fueld">
                    <div class="row">
                        <?php foreach($products as $item): ?>
                            <div class="col-4 product_item">
                                <div class="card container_item">
                                    <img class="card-img-top card_img" src="<?php echo $item['image'] ?> " alt="Книга-<?php echo $item['name'] ?>">
                                    <div class="card-body">
                                        <h5 class="card-title card-title_name">
                                            <a href="/product/<?php echo $item['id']; ?>">
                                                <?php echo $item['name'] ?>
                                            </a>
                                        </h5>
                                        <div> <a class="btn btn-primary btn_busket" href="/cart/add/<?php echo $item['id']; ?>">В корзину</a></div>
                                            <div class="price">
                                            <b><?php echo $item['price'];?> ₽</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<?php require ROOT . "/view/layouts/footer.php" ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
    </body>
</html>
