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
  <div class="container">
    <form method="POST" class="register-form">
      <h2>Dodaj post</h2>
      <div class="form-field">
        <label>
          Tytuł
          <input type="text" name="title" value="<?php echo isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '' ?>" />
        </label>
        <?php echo in_array('title', $errors) ? '<p class="form-err">Tytuł nie może zawierać więcej niż 100 znaków!</p>' : ''; ?>
      </div>
      <div class="form-field">
        <label>
          Treść
          <textarea name="post"><?php echo isset($_POST['post']) ? htmlspecialchars($_POST['post']) : '' ?></textarea>
        </label>
        <?php echo in_array('post', $errors) ? '<p class="form-err">Post nie może zawierać więcej niż 250 znaków!</p>' : ''; ?>
        <?php  echo in_array('fields', $errors) ? '<p class="form-err">Oba pola są obowiązkowe!</p>' : ''; ?>
      </div>
      <button type="submit" class="form-btn">Dodaj post</button>
    </form>
  </div>
</body>
</html>
