<?php
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = "home";
}
$file = "includes/" . $page . ".php";
assert("strpos('$file', '..') === false") or die("ERROR: hacking attempt!");
?>