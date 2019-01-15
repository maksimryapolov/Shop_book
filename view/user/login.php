<?php require ROOT . "/view/layouts/header.php" ?>

<div class="text-center">
    <div class="login_form">
        <h1 class="h3 font-weight-normal login_form-title">Вход</h1>
        <?php if(isset($errors) && is_array($errors)) : ?>
            <?php foreach($errors as $error): ?>
                <div class="alert alert-primary" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endforeach ?>
        <?php endif ?>

        <form action="" method="post" >
            <div class="from-group">
                <input id="exampleInputLogin1" class="form-control" type="text" name="email" placeholder="Логин" value="<?php echo $email; ?>">
            </div>
            <div class="from-group">
                <input id="exampleInputEmail1" class="form-control" type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>">
            </div>
            <input type="submit" name="submit" class="btn btn-outline-warning">
        </form>
    </div>
</div>
    <?php require ROOT . "/view/layouts/footer.php" ?>
</body>
</html>