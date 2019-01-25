<?php

class UserController 
{
    static public  function actionRegister()
  {
    
    $listCategory = Category::getCategoryList();

    $name = '';
    $email = '';
    $password = '';
    $result = false;

    if( isset($_POST['submit']) ) { 

      $errors = false;

     $name = $_POST['name'];
     $email = $_POST['email'];
     $password = $_POST['password'];

     if( !User::checkName($name) ) {
      $errors[] = 'Логин должен быть не короче 3-ёх символов';
     }

     if( !User::checkEmail($email) ) {
      $errors[] = 'Неверный email';
     }

     if ( User::checkEmailExists($email) ) {
      $errors[] = "Такой email уже используется";
    }

     if( !User::checkPassword($password) ) {
      $errors[] = 'Пароль не должен быть короче 6-ти символов';
     }

     if( $errors == false) {
      $result = User::register($name, $email, $password);
     }
  }
  
  require_once ROOT . "/view/user/register.php";
  return true;
  }

  static public  function actionLogin()
  {
    
    $email = '';
    $password = '';

    if (isset($_POST['submit']) ){

      $email = $_POST['email'];
      $password = $_POST['password'];

      $errors = false;

      if( !User::checkEmail($email) ) {
        $errors[] = 'Неверный email';
       }

      if( !User::checkPassword($password) ) {
        $errors[] = 'Пароль не должен быть короче 6-ти символов';
       }

       //есть ли такой пользователь в базе
       $userId = User::CheckUserData($email, $password);
      
       if ($userId == false) {
        $errors[] = 'Неверные данные для входа';
       } else {
         User::auth($userId);
        
         header('Location: /cabinet/');
       }

    }
    require_once ROOT . "/view/user/login.php";
    return true;
  }

  static public function actionLogout()
  {

      unset($_SESSION['user']);
      header('Location: /');
  }
}
?>