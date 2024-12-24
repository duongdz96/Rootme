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
 
- The eval() function evaluates a string as PHP code.
- The string must be valid PHP code and must end with semicolon.
- Returns NULL unless a return statement is called in the code string. Then the value passed to return is returned. If there is a parse error in the code string, eval() returns FALSE.
