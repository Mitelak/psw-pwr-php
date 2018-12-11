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
          <a class="header-link" href="/">
            <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDI5OC42NjcgMjk4LjY2NyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMjk4LjY2NyAyOTguNjY3OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4Ij4KPGc+Cgk8Zz4KCQk8Zz4KCQkJPHBvbHlnb24gcG9pbnRzPSIwLDE3MC42NjcgNjQsMTcwLjY2NyAyMS4zMzMsMjU2IDg1LjMzMywyNTYgMTI4LDE3MC42NjcgMTI4LDQyLjY2NyAwLDQyLjY2NyAgICAiIGZpbGw9IiNGRkZGRkYiLz4KCQkJPHBvbHlnb24gcG9pbnRzPSIxNzAuNjY3LDQyLjY2NyAxNzAuNjY3LDE3MC42NjcgMjM0LjY2NywxNzAuNjY3IDE5MiwyNTYgMjU2LDI1NiAyOTguNjY3LDE3MC42NjcgMjk4LjY2Nyw0Mi42NjcgICAgIiBmaWxsPSIjRkZGRkZGIi8+CgkJPC9nPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" alt="" />
            <h1>TwujCytat</h1>
          </a>
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
