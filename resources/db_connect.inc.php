<?php
  try {
    $pdo = new PDO('mysql:host=localhost:3306;dbname=psw', 'psw', 'test1');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo 'Połączenie z bazą danych nie mogło zostać nawiązane: ' . $e->getMessage();
  }
?>
