<?php

class CabinetController 
{
    static public function actionIndex()
    {
        User::checkLogged();

        require_once ROOT . "/view/cabinet/index.php";

        return true;
    }
    static public function actionEdit()
    {
        $userId = User::checkLogged();
            
        $user = User::getUserById($userId);

        $name = $user['name'];
        $password = $user['password'];
        $result = false;

        if (isset($_POST['button'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];

            $errors =false;

            if( !User::checkName($name) ) {
                $errors[] = 'Логин должен быть не короче 3-ёх символов';
            }

            if( !User::checkPassword($password) ) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
               }

            if ($errors == false) {
                $result = User::edit($userId, $name, $password);
            }
        }

        require_once ROOT . "/view/cabinet/edit.php";
        return true;
    }
}
?>