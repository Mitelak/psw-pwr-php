<!DOCTYPE html>
<html lang="en">
<head>
<?php
  include_once '../assets/template/head.inc.php';
  getHead('PSW - Dodaj post');
?>
</head>
<body>
  <?php include_once '../assets/template/topbar.html.php'; ?>

  <form method="POST" class="register-form">
    <h1>Dodaj post</h1>
    <div class="form-field">
      <label>
        Tytuł
        <input type="text" name="title" />
      </label>
      <?php  echo in_array('title', $errors) ? '<p class="form-err">Pole jest obowiązkowe!</p>' : ''; ?>
    </div>
    <div class="form-field">
      <label>
        Treść
        <textarea name="post"></textarea>
      </label>
      <?php  echo in_array('post', $errors) ? '<p class="form-err">Pole jest obowiązkowe!</p>' : ''; ?>
    </div>
    <button type="submit" class="form-btn">Dodaj post</button>
  </form>
</body>
</html>