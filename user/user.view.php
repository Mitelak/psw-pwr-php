<!DOCTYPE html>
<html lang="en">
<head>
<?php
  require_once('../assets/template/head.inc.php');
  getHead('PSW - profil użytkownika');
?>
</head>
<body>
  <header class="topbar">
    <div class="container">
      <span class="user">Użytkownik: <?php echo $_SESSION['login']; ?></span>
      <a href="../resources/logout.php">Wyloguj</a>
    </div>
  </header>
  <form method="POST" class="register-form">
    <h1>USER</h1>
    <div class="form-field">
      <label>
        Login
        <p><?php echo isset($user['login']) ? htmlspecialchars($user['login']) : '' ?></p>
      </label>
    </div>
    <div class="form-field">
      <label>
        Email
        <input type="email" name="email" value="<?php echo isset($user['email']) ? htmlspecialchars($user['email']) : '' ?>" />
      </label>
      <?php  echo in_array('email', $errors) ? '<p class="form-err">' . $VALIDATIONS_STRINGS['email'] . '</p>' : ''; ?>
      <?php  echo in_array('email_exists', $errors) ? '<p class="form-err">' . $VALIDATIONS_STRINGS['email_exists'] . '</p>' : ''; ?>
    </div>
    <div class="form-field">
      <label>
        Hasło
        <input type="password" name="password" placeholder="Nowe hasło" />
      </label>
    </div>
    <div class="form-field">
      <label>
        Powtórz hasło:
        <input type="password" name="confirm_password" placeholder="Powtórz nowe hasło" />
      </label>
    </div>
    <?php  echo in_array('password', $errors) ? '<p class="form-err">' . $VALIDATIONS_STRINGS['password'] . '</p>' : ''; ?>
    <div class="form-field">
      <label>
        Licencja:
        <select id="licence" name="licence">
            <?php
              foreach($LICENCES as $licence) {
                echo ("<option value=\"" . $licence . "\""
                    . (!strcmp($user['licence'], $licence) ? ' selected' : '')
                    . '>' . $licence . "</option>\n");
              }
            ?>
        </select>
      </label>
    </div>
    <div class="form-field">
      <div class="form-field-rules">
          <?php //setcookie("mode", "", time()-3600); ?>

          <div>Kolor aplikacji:</div>
          <label>
            Dark
            <input type="radio" name="mode" value="dark" <?php echo isset($_COOKIE['mode']) && $_COOKIE['mode'] == 'dark' ?  'checked' : '' ?> />
          </label>
          <label>
            Light
            <input type="radio" name="mode" value="light" <?php echo (isset($_COOKIE['mode']) && $_COOKIE['mode'] == 'light' || !isset($_COOKIE['mode'])) ?  'checked' : '' ?> />
          </label>
        </div>
      </div>
    </div>
    <button type="submit" class="form-btn">Aktualizuj dane</button>
  </form>
</body>
</html>
