<?php
  require '../resources/authorize.inc.php';
  include_once "../resources/db_connect.inc.php";

  try {
    $query = $pdo -> prepare('SELECT login, email, licence, password FROM users WHERE login = :login');
    $query -> execute(['login' => $_SESSION['login']]);
    $user = $query -> fetch();
  } catch (PDOException $e) {
    echo 'Wystapil blad biblioteki PDO: ' . $e->getMessage();
  }

  $LICENCES = array('student', 'teacher', 'enterprice');

  $VALIDATIONS_STRINGS = array(
    "email" => "Niepoprawny mail",
    "email_exists" => "Wprowadzony email jest już używany",
    "password" => "Hasła są różne",
    "fields" => "Wszystkie pola są wymagane!"
  );

  $errors = array();

  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {

    if ($_POST['action'] == 'change_color') {
      if(isset($_POST['mode']) && $_POST['mode'] != ''){
        setcookie('mode', $_POST['mode'], time() + 86400 * 365, '/');
        header('Location: /user ');
      }
    }

    if ($_POST['action'] == 'update_data') {

      if (isset($_POST['email']) && $_POST['email']
      && isset($_POST['password']) && $_POST['password']
      && isset($_POST['confirm_password']) && $_POST['confirm_password']
      && isset($_POST['licence']) && $_POST['licence']){
        
        if(preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $_POST['email']) === null) {
          $errors[] = 'email';
        }
      
        if($_POST['password'] !== $_POST['confirm_password']) {
          $errors[] = 'password';
        }

        if (count($errors) === 0) {
          $new_password = password_hash($_POST['password'], PASSWORD_BCRYPT);

          try {
            $query = $pdo -> prepare('UPDATE users SET email = :email, licence = :licence, password = :password WHERE login = :login');
            $query -> execute(['login' => $_SESSION['login'], 'email' => $_POST['email'], 'licence' => $_POST['licence'], 'password' => $new_password]);
          } catch (PDOException $e) {
            if((int)$e->getCode() == 23000) {
              $errors[] = 'email_exists';
            } else {
              echo 'Wystapil blad biblioteki PDO: ' . $e->getMessage();
            }
          }
        }
        
      } else {
        $errors[] = 'fields';
      }
    }
  }

  include 'user.view.php';
?>
