<?php require ROOT . "/view/layouts/header.php" ?>
<div class="jumbotron">
    <div class="row">
        <div class="col-3">
            <ul class="list-group container_category">
                <?php foreach($categories as $item): ?>
                    <a href="/category/<?php echo $item["id"]?>">
                        <li class="list-group-item <?php if($item['id'] == $category_id): echo "active" ?><?php endif ?>">      
                            <?php echo $item['name']; ?> 
                        </li>
                    </a>
                <?php endforeach ?>
            </ul>
        </div>

        <div class="col-8">
            <?php foreach($itemCategory as $elem) :?>
                <img src="<?php echo $elem['image'] ?>" alt="<?php echo $elem['name'] ?>" style="width: 250px;">
                <h1><?php echo  $elem['name'] ;?></h1>
                <h3><?php echo  $elem['price'] ;?> ₽</h3>
                <div><?php echo  $elem['Author_name'] ;?></div>
                <p class="desc"><?php echo  $elem['description'] ;?></p>
                <hr>
            <?php endforeach ?>
        </div>
    </div>
    <div class="ss"><?php echo $pagination->get(); ?></div>
        
</div>

<?php require ROOT . "/view/layouts/footer.php" ?>

    </body>
</html>