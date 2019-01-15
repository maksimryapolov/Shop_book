<?php require ROOT . "/view/layouts/header.php" ?>
<div style="text-align: center">
    <?php if ($result) : ?>
        <h2>Данные изменены</h2>
    <?php else :?>
        <?php if (isset($errors) && is_array($errors)): ?>
            <?php foreach($errors as $error) : ?>
                <ul>
                    <li><?php echo $error; ?></li>
                </ul>
            <?php endforeach ?>
        <?php endif ?>
        <div class="text-center">
            <div class="login_form">
                <h2>Редактировние данных</h2>
                    <form method='post' action="">
                        <div class="from-group">
                            <input class="form-control" type="text" name="name" placeholder="Логин" value="<?php echo $user['name']; ?>"> 
                        </div>
                        <div class="from-group">
                            <input class="form-control" type="password" name="password" placeholder="Пароль" value="<?php echo $user['password']; ?>">
                        </div>
                        <input type="submit" name="submit" class="btn btn-outline-warning">
                    </form>
                </div>
            </div>
        <div>
    <?php endif ?>
<?php require ROOT . "/view/layouts/footer.php" ?>
</body>
</html>
