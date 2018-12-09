<!DOCTYPE html>
<html lang="pl">
<head>
<?php
  require_once('../assets/template/head.inc.php');
  getHead('PSW - rejestracja');
?>
</head>
<body>
  <form method="POST" class="register-form">
    <h1>Rejestracja</h1>
    <div class="form-field">
      <label>
        Login
        <input type="text" name="login" value="<?php echo isset($_POST['login']) ? htmlspecialchars($_POST['login']) : '' ?>" />
      </label>
    </div>
    <div class="form-field">
      <label>
        Email
        <input type="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" />
      </label>
      <?php  echo in_array('email', $errors) ? '<p class="form-err">' . $VALIDATIONS_STRINGS['email'] . '</p>' : ''; ?>
    </div>
    <div class="form-field">
      <label>
        Hasło
        <input type="password" name="password" />
      </label>
      <?php  echo in_array('password', $errors) ? '<p class="form-err">' . $VALIDATIONS_STRINGS['password'] . '</p>' : ''; ?>
    </div>
    <div class="form-field">
      <label>
        Potwierdź hasło
        <input type="password" name="confirm_password" />
      </label>
      <?php  echo in_array('password', $errors) ? '<p class="form-err">' . $VALIDATIONS_STRINGS['password'] . '</p>' : ''; ?>
    </div>
    <div class="form-field">
      <label>
        Licencja:
        <select id="licence" name="licence">
            <option value="">--Please choose an option--</option>
            <?php
              foreach($LICENCES as $licence) {
                echo ("<option value=\"" . $licence . "\""
                    . (!strcmp($_POST['licence'], $licence) ? ' selected' : '')
                    . '>' . $licence . "</option>\n");
              }
            ?>
        </select>
      </label>
    </div>
    <div class="form-field">
      <div class="form-field-rules">
        <div>Czy akceptujesz regulamin?</div>
        <label>
          Tak
          <input type="radio" name="rules" value="true" <?php echo isset($_POST['rules']) && json_decode($_POST['rules']) ?  'checked' : '' ?> />
        </label>
        <label>
          Nie
          <input type="radio" name="rules" value="false" <?php echo isset($_POST['rules']) && !json_decode($_POST['rules']) ?  'checked' : '' ?> />
        </label>
      </div>
      <?php  echo in_array('rules', $errors) ? '<p class="form-err">' . $VALIDATIONS_STRINGS['rules'] . '</p>' : ''; ?>
    </div>
    <div class="form-field">
      <label>
        2 + 2 * 2 =
        <input type="text" name="captcha" />
      </label>
      <?php  echo in_array('captcha', $errors) ? '<p class="form-err">' . $VALIDATIONS_STRINGS['captcha'] . '</p>' : ''; ?>
    </div>
    <?php  echo in_array('fields', $errors) ? '<p class="form-err">' . $VALIDATIONS_STRINGS['fields'] . '</p>' : ''; ?>
    <?php  echo in_array('user', $errors) ? '<p class="form-err">' . $VALIDATIONS_STRINGS['user'] . '</p>' : ''; ?>
    <button type="submit" class="form-btn">Zarejestruj</button>
  </form>
</body>
</html>
