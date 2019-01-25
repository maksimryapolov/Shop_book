    <?php require ROOT . "/view/layouts/header.php" ?>

    <div class="container">
        <?php foreach($listComment as $comment): ?>
            <div class="alert alert-<?php echo $comment['rating']?>" role="alert">
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

        <?php if(isset($errors) && is_array($errors)) : ?>
            <ul class="errorsBlock">
                <?php foreach($errors as $error): ?>
                    <li><?php echo $error ?></li>
                <?php endforeach ?> 
            </ul>
        <?php endif ?>

        <form action="" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Заголовок</label>
                <input type="text" name=" title" class="form-control" value="<?php echo $title ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Коментарий</label>
                <textarea class="form-control" name="comment" value="<?php echo $comment ?>" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <?php if($userGuest) : ?>
                    <p>чтобы оставлять отзывы <a href="/user/login">войдите</a> или <a href="/check_in/"> зарегстрируйтесь</a></p>
            <?php else: ?>
            <div class="ratingBlock">
                    <div class="commentLike rating" data-id="2"></div>
                     <!-- commentLikeActive  commentDislikeActive -->
                    <div class="commentDislike rating" data-id="0"></div>
                </div>
                <input type="submit" name="button" class="btn btn-primary">
                <div id="ratingBlock">
                </div>
            <?php endif ?>
        </form>
    </div>

    <?php require ROOT . "/view/layouts/footer.php" ?>
    <script src="../../template/js/comment.js"></script>
        
    </body>
</html>