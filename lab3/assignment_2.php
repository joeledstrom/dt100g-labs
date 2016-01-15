<?php
// Joel Edström (joed1300)
// DT100G: lab3

session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // save last postdata in session
  foreach ($_POST as $key => $value) {
    $_SESSION[$key] = htmlspecialchars($value);
    if ($key == 'showcard' && $value == "0")
      unset($_SESSION['showcard']);
  }
}

// Put some default data
if (!isset($_SESSION['company'])) {
  $_SESSION['company'] = "DesignSpecialisten";
  $_SESSION['name'] = "Mårten Gås";
  $_SESSION['title'] = "Tänkare";
  $_SESSION['phone'] = "176 167";
  $_SESSION['email'] = "martin.gas@sov.nu";
}

?>


<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>Lab3 Assignment 2</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <?php require('header.php') ?>

    <?php
      if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["clear"])) {
        $_SESSION['assign1_name'] = "";
      }
    ?>

    <form method="post">
      <input type="hidden" name="clear" value="1" />
      <input type="submit" value="Clear name" />
    </form>
    <p>Name from assignment 1: <?= $_SESSION['assign1_name'] ?></p>


    <?php if (!isset($_SESSION['showcard'])) { ?>
      <form method="post">
        <label><span>Företag:</span><input type="text" name="company" value="<?= $_SESSION['company'] ?>" /></label>
        <label><span>Namn:</span><input type="text" name="name" value="<?= $_SESSION['name'] ?>" /></label>
        <label><span>Titel:</span><input type="text" name="title" value="<?= $_SESSION['title'] ?>" /></label>
        <label><span>Telefon:</span><input type="text" name="phone" value="<?= $_SESSION['phone'] ?>" /></label>
        <label><span>E-post:</span><input type="email" name="email" value="<?= $_SESSION['email'] ?>"/></label>
        <label><span>Bakgrundsfärg:</span>
          <select name="background-color">
            <option value="#A4CDFF">Ljusblå</option>
            <option value="#E0CF6F">Ljusgul</option>
            <option value="#FFFFFF">Vit</option>
            <option value="#6FFFFF">Turkos</option>
          </select>
        </label>
        <label><span>Textfärg:</span>
          <select name="color">
            <option value="#000000">Svart</option>
            <option value="#0000FF">Blå</option>
            <option value="#FF0000">Röd</option>
            <option value="#008000">Mörkgrön</option>
          </select>
        </label>
        <label><span>Typsnitt:</span>
          <select name="font-family">
            <option value="Verdana">Verdana</option>
            <option value="Arial">Arial</option>
            <option value="Tahoma">Tahoma</option>
            <option value="Impact">Impact</option>
          </select>
        </label>
        <input type="hidden" name="showcard" value="1" />
        <span></span><input type="reset" value="Återställ" />
        <input type="submit" value="Skriv ut" />
      </form>

    <?php } else { ?>

      <div id="card" style="
        background-color: <?= $_SESSION['background-color'] ?>;
        color: <?= $_SESSION['color'] ?>;
        font-family: <?= $_SESSION['font-family'] ?>;
      ">
        <h1 id="company"><?= $_SESSION['company'] ?></h1>
        <h2 id="name"><?= $_SESSION['name'] ?></h2>
        <h3 id="title"><?= $_SESSION['title'] ?></h3>
        <h2>Tfn <span id="phone"><?= $_SESSION['phone'] ?></span></h2>
        <h4>E-post: <span id="email"><?= $_SESSION['email'] ?></span></h4>
      </div>
      <form method="post">
        <input type="hidden" name="showcard" value="0" />
        <input type="submit" value="Back to form" />
      </form>
    <?php } ?>

  </body>
</html>
