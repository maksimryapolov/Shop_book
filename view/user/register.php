<?php require ROOT . "/view/layouts/header.php" ?>
    <?php if ($result) :?>
        <div class="container-fluid register-block">
            <div class="row">
                <div class="col-3">
                    <?php foreach($listCategory as $item): ?>
                        <a href="/category/<?php echo $item[" id "]?>">
                            <li class="list-group-item link-item">
                                <?php echo $item['name']; ?>
                            </li>
                        </a>
                        <?php endforeach ?>
                </div>
                <div class="col-8">
                    <div class="container">
                        <p class="success_title">Вы зарегистрированны</p>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
            <div class="text-center">
                <div class="login_form">
                    <h1 class="h3 font-weight-normal login_form-title">Регистрация</h1>
                    <?php if(isset($errors) && is_array($errors)) : ?>
                        <?php foreach($errors as $error): ?>
                            <div class="alert alert-primary" role="alert">
                                <?php echo $error; ?>
                            </div>
                            <?php endforeach ?>
                                <?php endif ?>
                                    <form method='post' action="">
                                        <div class="from-group">
                                            <input class="form-control" type="text" name="name" placeholder="Логин" value="<?php echo $name ?>"> </div>
                                        <div class="from-group">
                                            <input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo $email ?>"> </div>
                                        <div class="from-group">
                                            <input class="form-control" type="password" name="password" placeholder="Пароль" value="<?php echo $password ?>"> </div>
                                        <input type="submit" name="submit" class="btn btn-outline-warning">
                                        <?php endif ?>
                                    </form>
                </div>
            </div>
            <?php require ROOT . "/view/layouts/footer.php" ?>
                </body>

                </html>