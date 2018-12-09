<!DOCTYPE html>
<html lang="pl">
<head>
<?php
  require_once('../assets/template/head.inc.php');
  getHead('PSW - login');
?>
</head>
<body>
  <form method="POST" class="register-form">
    <h1>Logowanie</h1>
    <div class="form-field">
      <label>
        Login
        <input type="text" name="login" value="<?php echo isset($_POST['login']) ? htmlspecialchars($_POST['login']) : '' ?>" />
      </label>
    </div>
    <div class="form-field">
      <label>
        Hasło
        <input type="password" name="password" />
      </label>
    </div>
    <?php  echo $is_error ? '<p class="form-err">' . $error_message . '</p>' : ''; ?>
    <button type="submit" class="form-btn">Zaloguj</button>
    <p>Nie masz konta? <a href="/register/">Zarejestruj się!</a></p>
  </form>
</body>
</html>
