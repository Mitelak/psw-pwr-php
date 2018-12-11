<?php
  function getHead($title = 'PSW') {
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<meta http-equiv="X-UA-Compatible" content="ie=edge">';
    echo '<link rel="icon" href="/assets/img/favicon.png" type="image/png">';
    echo '<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&amp;subset=latin-ext" rel="stylesheet">';
    if (isset($_COOKIE['mode']) && $_COOKIE['mode'] == 'dark') {
      echo '<link rel="stylesheet" href="/assets/css/dark.css">';
    } else {
      echo '<link rel="stylesheet" href="/assets/css/light.css">';
    }
    echo '<link rel="stylesheet" href="/assets/css/styles.css">';
    echo '<title>' . $title . '</title>';
  }
?>
