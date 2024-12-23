# Eval function in PHP

Example:

```php
<?php
$string = "beautiful";
$time = "winter";

$str = 'This is a $string $time morning!';
echo $str. "<br>";

eval("\$str = \"$str\";");
echo $str;
?>
```

Output:

```text
This is a $string $time morning!
This is a beautiful winter morning!
```

