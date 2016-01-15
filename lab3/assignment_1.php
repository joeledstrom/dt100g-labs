<?php
// Joel Edström (joed1300)
// DT100G: lab3

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['assign1_name'] = htmlspecialchars($_POST["assign1_name"]);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Lab3 Assignment 1</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <?php require('header.php') ?>

    <form method="post">
      <label>
        <span>Name:</span>
        <input type="text" name="assign1_name" placeholder="Your name"
        value="<?= $_SESSION['assign1_name'] ?>"/>
      </label>
      <input type="submit" value="Save" />
    </form>

    <div>
      <h1>My development environment:</h1>
      <ul>
        <li><b>OS: </b>OS X 10.11.2</li>
        <li><b>Editor: </b>For PHP I'm using github's <a href="http://atom.io">Atom editor</a></li>
        <li>
          <b>Server: </b>
          Apache2 and PHP5.6 from a <a href="https://www.docker.com">docker</a> image (<a href="https://hub.docker.com/r/occitech/cakephp/">occitech/cakephp:5-apache</a>).
          With the pdo_pgsql extension added for PostgreSQL support (Installed by the second command in the <i>Dockerfile</i>).
        </li>
      </ul>
    </div>

    <div>
      <h1>Some information:</h1>
      <ul>
        <li><b>Current datetime:</b> <?= date('Y-m-d H:i'); ?></li>

        <?php if (date('N') == 5) { /* if friday */ ?>
          <li><b>Thank god! its friday!</b></li>
        <?php } ?>

        <li><b>Visitor IP:</b> <?= $_SERVER['REMOTE_ADDR'] ?></li>
        <li><b>Scriptname:</b> <?= $_SERVER['SCRIPT_FILENAME'] ?></li>
        <li><b>User Agent:</b> <?= $_SERVER['HTTP_USER_AGENT'] ?></li>
      </ul>
    </div>

  </body>
</html>
