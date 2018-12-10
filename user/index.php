<?php
  include '../resources/is_logged.php';
  include_once "../resources/db_connect.inc.php";

  try {
    $query = $pdo -> prepare('SELECT login, email, licence, password FROM users WHERE login = :login');
    $query -> execute(['login' => $_SESSION['login']]);
    $user = $query -> fetch();

    if ($user > 0) {


    } else {
      // $is_error = true;
      echo 'blad';
    }
  } catch (PDOException $e) {
    echo 'Wystapil blad biblioteki PDO: ' . $e->getMessage();
  }

  $LICENCES = array('student', 'teacher', 'enterprice');

  $VALIDATIONS_STRINGS = array(
    "email" => "Niepoprawny mail",
    "email_exists" => "Wprowadzony email już istnieje",
    "password" => "Hasła są niepoprawne",
  );

  $errors = array();

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email']) && $_POST['email']){
      if(preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $_POST['email']) === null) {
        $errors[] = 'email';
      }
    }


    $new_password = $user['password'];

    if(isset($_POST['password']) || isset($_POST['confirm_password'])){
      if($_POST['password'] !== $_POST['confirm_password']) {
        $errors[] = 'password';
      } else {
        $new_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
      }
    }

    if (count($errors) === 0) {
      try {
        $query = $pdo -> prepare('UPDATE users SET email = :email, licence = :licence, password = :password WHERE login = :login');
        $query -> execute(['login' => $_SESSION['login'], 'email' => $_POST['email'], 'licence' => $_POST['licence'], 'password' => $new_password]);

        if(isset($_POST['mode']) && $_POST['mode'] != ''){
          setcookie('mode', $_POST['mode'], time() + 86400 * 365, '/');
          header('Location: /user ');
        }
      } catch (PDOException $e) {
        if((int)$e->getCode() == 23000) {
          $errors[] = 'email_exists';
        } else {
          echo 'Wystapil blad biblioteki PDO: ' . $e->getMessage();
        }
      }
    }
  }

  include 'user.view.php';
?>
