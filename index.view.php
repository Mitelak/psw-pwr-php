<!DOCTYPE html>
<html lang="en">
<head>
<?php 
  include 'assets/template/head.inc.php';
  getHead('PSW - wpisy');
?>
</head>
<body>
  <?php 
    if (isset($_SESSION['login']) && $_SESSION['login']) {
      include 'assets/template/topbar.html.php';
    } else { ?>
      <header class="topbar">
        <div class="container">
          <h1>TwujCytat</h1>
          <a href="/login">Zaloguj się</a>
        </div>
      </header> 
  <?php
    }
  ?>
  <div class="container">
    <h2>Wpisy użytkowników</h2>
    <div class="posts">
      <?php 
        foreach ($posts as $row) {
      ?>
         <div class="post">
          <p class="post-title"><?php echo htmlspecialchars($row['title']) ?></p>
          <p class="post-body"><?php echo htmlspecialchars($row['post']) ?></p>
          <p class="post-author"><?php echo htmlspecialchars($row['user']) ?></p>
        </div>
      <?php
        }
      ?>
    </div>
  </div>
</body>
</html>
