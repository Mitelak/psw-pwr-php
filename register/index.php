<?php

  /*
    Walicja danych formularza rejestracujnego do painta
  */

	define("CAPTCHA_RESULT", 2+2*2); //pierwszenstwo operatorow

  $LICENCES = array('student', 'teacher', 'enterprice');

  $VALIDATIONS_STRINGS = array(
    "email" => "Niepoprawny mail",
    "password" => "Hasła są niepoprawne",
    "rules" => "Nie zaakceptowano regulaminu",
    "captcha" => "Niepoprawny wynik działania",
    "licence" => "Nie wybrano typu licencji",
    "fields" => "Wypełnij wszystkie pola!",
    "user" => "Taki użytkownik już istnieje!"
  );

  $errors = array();

  // sprawdzenie czy są przesłane wszystkie dane formularzem
  if (isset($_POST['login']) && $_POST['login']
    && isset($_POST['password']) && $_POST['password']
    && isset($_POST['email']) && $_POST['email']
    && isset($_POST['rules']) && $_POST['rules']
    && isset($_POST['captcha']) && $_POST['captcha']
    && isset($_POST['confirm_password']) && $_POST['confirm_password'])  {

    //sprawdzenie maila
    if(preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $_POST['email']) === null) {
      $errors[] = 'email';
    }
    //sprawdzenie hasel
    if ($_POST['password'] !== $_POST['confirm_password']) {
      $errors[] = 'password';
    }
    //sprawdzenie zaakceptowania regulaminu
    if (!filter_var($_POST['rules'], FILTER_VALIDATE_BOOLEAN)) {
      $errors[] = 'rules';
    }
    // rzutowanie
		if ((int)$_POST['captcha'] !== CAPTCHA_RESULT) {
      $errors[] = 'captcha';
		}
    //sprawdzenie czy wybrano licencje
    if ($_POST['licence'] === '') {
      $errors[] = 'licence';
    }

    if (count($errors) === 0) {
      include_once "../resources/db_connect.inc.php";
      try {
        $query = $pdo->prepare('INSERT INTO `users` (`login`, `email`, `password`, `licence`) VALUES(
            :login,
            :email,
            :password,
            :licence
          )');
        $query -> bindValue(':login', $_POST['login'], PDO::PARAM_STR);
        $query -> bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $query -> bindValue(':password', password_hash($_POST['password'], PASSWORD_BCRYPT), PDO::PARAM_STR);
        $query -> bindValue(':licence', $_POST['licence'], PDO::PARAM_STR);
        
        $result = $query -> execute();

        if ($result > 0) {    
          header('Location: /user');
          die();
        } else {
          echo 'Wystąpił błąd podczas rejestracji';
        }

      } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
          $errors[] = 'user';
        } else {
          echo 'Wystapil blad bazy danych: ' . $e->getMessage();
        }
      }
    }
  } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors[] = 'fields';
  }
  
  include 'register.view.php';
?>
