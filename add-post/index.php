<?php
  require '../resources/authorize.inc.php';

  $errors = array();

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['title']) && $_POST['title']
      && isset($_POST['post']) && $_POST['post']){

        if (strlen($_POST['title']) > 100) {
          $errors[] = 'title';
        }
        if (strlen($_POST['post']) > 250) {
          $errors[] = 'post';
        }
        if (count($errors) === 0) {
          include_once "../resources/db_connect.inc.php";
          try {
            $query = $pdo->prepare('INSERT INTO `posts` (`user`, `title`, `post`, `isPublic`) VALUES(
                :user,
                :title,
                :post,
                true
              )');
            $query -> bindValue(':user', $_SESSION['login'], PDO::PARAM_STR);
            $query -> bindValue(':title', $_POST['title'], PDO::PARAM_STR);
            $query -> bindValue(':post', $_POST['post'], PDO::PARAM_STR);
            $result = $query -> execute();

            if ($result > 0) {    
              header('Location: /');
              die();
            } else {
              echo 'Wystąpił błąd podczas dodawania posta';
            }

          } catch (PDOException $e) {
            echo 'Wystapil blad bazy danych: ' . $e->getMessage();
          }
        }
      } else {
        $errors[] = 'fields';
      }
  }

  include 'addpost.view.php';
?>
