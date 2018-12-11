<header class="topbar">
  <div class="container">
    <h1>TwujCytat</h1>
    <a href="/">Wpisy</a>
    <a href="/add-post">Dodaj cytat</a>
    <a href="/user">Ustawienia</a>
    <div>
      <span class="user">Zalogowano jako <?php echo htmlspecialchars($_SESSION['login']) ?> |</span>
      <a href="../resources/logout.php">Wyloguj</a>
    </div>
  </div>
</header>
