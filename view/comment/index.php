    <?php require ROOT . "/view/layouts/header.php" ?>

    <div class="container">

        <?php foreach($listComment as $comment): ?>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">
                    <?php echo $comment['title']?> 
                        <span class="user_title-name">
                            <?php echo $comment["user_name"] ?>
                        </span>
                    </h4>
                <hr>
                <p class="mb-3"><?php echo $comment['content']?></p>
            </div>
        <?php endforeach ?>

        <form action="" method="post">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Коментарий</label>
                <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <input type="submit" name="button" class="btn btn-primary">
        </form>
    </div>
    
    <?php require ROOT . "/view/layouts/footer.php" ?>
    </body>
</html>