<?php 
  include_once 'resources/db_connect.inc.php';
  session_start();
  
  try {
    $query = $pdo -> query('SELECT user, title, post FROM posts');
    $posts = $query -> fetchAll();
  } catch (PDOException $e) {
    echo 'Wystapil blad biblioteki PDO: ' . $e->getMessage();
  }

  include 'index.view.php';
?>
