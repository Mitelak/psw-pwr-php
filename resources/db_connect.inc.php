<?php
  try {
    $pdo = new PDO('mysql:host=localhost;dbname=psw', 'psw', 'psw123');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo 'Połączenie z bazą danych nie mogło zostać nawiązane: ' . $e->getMessage();
  }
?>
