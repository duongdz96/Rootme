<?php
define('INCLUDEOK', true);
session_start();

if (isset($_GET['showsource'])) {
  show_source(__FILE__);
  die;
}

/******** AUTHENTICATION *******/
// login / passwords in a PHP array (sha256 for passwords) !
require_once('./passwd.inc.php');


if (!isset($_SESSION['login']) || !$_SESSION['login']) {
  $_SESSION['login'] = "";
  // form posted ?
  if ($_POST['login'] && $_POST['password']) {
    $data['login'] = $_POST['login'];
    $data['password'] = hash('sha256', $_POST['password']);
  }
  // autologin cookie ?
  else if ($_COOKIE['autologin']) {
    $data = unserialize($_COOKIE['autologin']);
    $autologin = "autologin";
  }

  // check password !
  if ($data['password'] == $auth[$data['login']]) {
    $_SESSION['login'] = $data['login'];

    // set cookie for autologin if requested
    if ($_POST['autologin'] === "1") {
      setcookie('autologin', serialize($data));
    }
  } else {
    // error message
    $message = "Error : $autologin authentication failed !";
  }
}
/*********************************/
?>



<html>

<head>
  <style>
    label {
      display: inline-block;
      width: 150px;
      text-align: right;
    }

    input[type='password'],
    input[type='text'] {
      width: 120px;
    }
  </style>
</head>

<body>
  <h1>Restricted Access</h1>

  <?php

  // message ?
  if (!empty($message))
    echo "<p><em>$message</em></p>";

  // admin ?
  if ($_SESSION['login'] === "superadmin") {
    require_once('admin.inc.php');
  }
  // user ?
  elseif (isset($_SESSION['login']) && $_SESSION['login'] !== "") {
    require_once('user.inc.php');
  }
  // not authenticated ? 
  else {
    ?>
    <p>Demo mode with guest / guest !</p>

    <p><strong>superadmin says :</strong> New authentication mechanism without any database. <a
        href="index.php?showsource">Our source code is available here.</a></p>

    <form name="authentification" action="index.php" method="post">
      <fieldset style="width:400px;">
        <p>
          <label>Login :</label>
          <input type="text" name="login" value="" />
        </p>
        <p>
          <label>Password :</label>
          <input type="password" name="password" value="" />
        </p>
        <p>
          <label>Autologin next time :</label>
          <input type="checkbox" name="autologin" value="1" />
        </p>
        <p style="text-align:center;">
          <input type="submit" value="Authenticate" />
        </p>
      </fieldset>
    </form>
    <?php
  }

  if (isset($_SESSION['login']) && $_SESSION['login'] !== "") {
    echo "<p><a href='disconnect.php'>Disconnect</a></p>";
  }
  ?>
</body>

</html>