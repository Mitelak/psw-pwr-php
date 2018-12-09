<?php
  session_start();

  $error_message = 'Login lub hasło jest niepoprawne';
  $is_error = false;

  if(isset($_SESSION['login'])) {
    header('Location: /user'); //TODO: zaktualizowac strone na ktora przekieruje
  }

  if (isset($_POST['login']) && $_POST['login']
    && isset($_POST['password']) && $_POST['password'] 
    ){
      
    include_once '../resources/db_connect.inc.php';
    try {
      $query = $pdo -> prepare('SELECT login, password FROM users WHERE login = :login');
      $query -> execute(['login' => $_POST['login']]);
      $result = $query -> fetch(); 

      if ($result > 0 && password_verify($_POST['password'], $result['password'])) {
        $_SESSION['login'] = $_POST['login'];
        header('Location: /user');
        die();
      } else {
        $is_error = true;
      }
    } catch (PDOException $e) {
      echo 'Wystapil blad biblioteki PDO: ' . $e->getMessage();
    }
  } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $is_error = true;    
  }
  include 'login.view.php';
?>
