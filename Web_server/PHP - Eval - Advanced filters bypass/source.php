<?php

error_reporting(0);

function safe_eval($calculus)
{
  preg_match_all("/([a-z_]+)/", strtolower($calculus), $words);
  $words = $words[0];

  $accepted_words = ['base_convert', 'pi'];
  $alphabet = str_split('_abcdefghijklmnopqrstuvwxyz0123456789.+-*/%()[],');

  var_dump($calculus);

  $safe = true;
  for ($i = 0; $i < count($words); $i++) {
    if (strlen($words[$i]) && (array_search($words[$i], $accepted_words) === false)) {
      $safe = false;
    }
  }

  for ($i = 0; $i < strlen($calculus); $i++) {
    if (array_search($calculus[$i], $alphabet) === false) {
      $safe = false;
    }
  }

  if (strlen($calculus) > 256)
    return "Expression too long.";
  $ans = '';
  if (($safe) === false)
    $ans = "This calculus is not safe.";
  else
    eval ('$ans=' . $calculus . ";");
  return $ans;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <link type="text/css" rel="stylesheet" href="./style.css">
  <title>PHP - Advanced filters bypass</title>
</head>

<body>
  <div class="content">
    <h2>PHP - Advanced filters bypass</h2>
    <br>
    <p>You can access the <a href="./?source">source code</a>.</p>
    <form class="" action="index.php" method="post">
      <table style="width:100%">
        <tr>
          <td><input class="forminput" type="text" name="calculus" value="1+1" size=50></td>
        </tr>
        <tr>
          <td><button class="formsubmitbutton" type="submit">Give me the result !</button></td>
        </tr>
        <?php if (isset($_POST['calculus'])): ?>
          <tr>
            <td><br /></td>
          </tr>
          <tr>
            <td class="result">
              <code style="width:100%;white-space: pre-wrap;"><?= @safe_eval($_POST['calculus']) ?></code>
            </td>
          </tr>
        <?php endif ?>
      </table>
    </form>
  </div>
</body>

</html>