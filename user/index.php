<?php
  include '../resources/is_logged.php';
  
  $LICENCES = array('student', 'teacher', 'enterprice');

  $VALIDATIONS_STRINGS = array(
    "email" => "Niepoprawny mail",
    "email_exists" => "Wprowadzony email już istnieje",
    "password" => "Hasła są niepoprawne",
  );

  $errors = array();

  include_once "../resources/db_connect.inc.php";
  echo $_SERVER['REQUEST_METHOD'];
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo 'test';
    if(isset($_POST['mode']) && $_POST['mode'] != ''){
      setcookie('mode', $_POST['mode'], time() + 86400 * 365, '/');
      header('Location: .');
    }

    if (isset($_POST['email']) && $_POST['email']){
      if(preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $_POST['email']) === null) {
        $errors[] = 'email';
      }
    }
  
    // if(isset($_POST['password']) && $_POST['password'] && isset($_POST['confirm_password']) && $_POST['confirm_password']){
    //   if($_POST['password'] !== $_POST['confirm_password']) {
    //     $errors[] = 'password';
    //   } else {
    //     //TODO: tworzneie nowego hasha
    //   }
    // }
    echo "TEST";
    if (count($errors) === 0) {
      try {
        $query = $pdo -> prepare('UPDATE users SET email = :email, licence = :licence WHERE login = :login');
        $result = $query -> execute(['login' => $_SESSION['login'], 'email' => $_POST['email'], 'licence' => $_POST['licence']]);
        echo $result;
        echo $query->rowCount();

      } catch (PDOException $e) {
        echo 'Wystapil blad biblioteki PDO: ' . $e->getMessage();
      } catch (Exception $e) {
        echo 'Wystapil blad biblioteki PDO: ' . $e->getMessage();
      }
    }
  }

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

  include 'user.view.php';
?>
