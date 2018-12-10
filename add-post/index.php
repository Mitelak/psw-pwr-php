<?php
  include '../resources/is_logged.php';
  include_once "../resources/db_connect.inc.php";


  $errors = array();

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['title']) && $_POST['title']){
      $errors[] = 'title';
    }

    if (isset($_POST['post']) && $_POST['post']){
      $errors[] = 'post';
    }
  }


  include 'addpost.view.php';
?>
