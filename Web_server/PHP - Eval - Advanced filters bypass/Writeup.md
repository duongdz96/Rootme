# PHP-Eval-Advanced filter bypass

- [PHP-Eval-Advanced filter bypass](#php-eval-advanced-filter-bypass)
  - [Source code](#source-code)
  - [Phân tích](#phân-tích)

## Source code 

```php
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
```

## Phân tích

- Hàm `safe_eval()` được dùng để filter dữ liệu và dùng hàm `eval` để thực thi `$calculus` được truyền vào. 
- Trong hàm `safe_eval()` sử dụng `preg_match_all` để tách các chữ cái và kí tự `_`, kiểm tra kí độ dài của chuỗi nhập vào.
- Phân tích sâu hơn: 
  - Hàm `preg_match_all("/([a-z_]+)/", strtolower($calculus), $words);` dùng để lấy dữ liệu từ chuỗi `$calculus`, tách các kí tự `a-z,_` và sau đó lưu vào mảng $words.
  - Đoạn code preg_match_all: 
    ```php
    <?php
    preg_match_all("/([a-z_]+)/", strtolower('abcdefghijk'), $words);
    print_r($words);
    echo "\n";
    $words = $words[0];
    ?>
    ```

    ```text
    Output:
    Array
      (
        [0] => Array
          (
            [0] => abcdefghijk
          )

        [1] => Array
          (
            [0] => abcdefghijk
          )
      )
    ```
  - Biến `$words` là mảng 2 chiều, được tạo ra từ hàm `preg_match_all()`, sau đó gán `$words = $words[0]`.
  ```php
  for ($i = 0; $i < count($words); $i++) 
  {
    if (strlen($words[$i]) && (array_search($words[$i], $accepted_words) === false)) 
    {
      $safe = false;
    }
  }
  ```
  - Đây là đoạn code kiểm tra xem chuỗi nhập vào có phải hợp lí không. Chuỗi hợp lệ được lưu trong mảng `$accepted_words`. Nó sẽ kiểm tra từng chuỗi trong mảng `$words`, sau đó kiểm tra xem nó có phải là chuỗi hợp lệ không.
  ```php
  for ($i = 0; $i < strlen($calculus); $i++) {
    if (array_search($calculus[$i], $alphabet) === false) 
    {
      $safe = false;
    }
  }
  ```
  - Đoạn code này sẽ kiểm tra xem trong chuỗi nhập vào có các kí tự trong mảng `$alphabet`, nếu không trùng sẽ trả về false
  ```php
  if (strlen($calculus) > 256)
    return "Expression too long.";
  $ans = '';
  if (($safe) === false)
    $ans = "This calculus is not safe.";
  else
    eval ('$ans=' . $calculus . ";");
  return $ans;
  ```
  - Đoạn code này sẽ dùng để kiểm tra các điều kiện và thực thi chuỗi người dùng nhập vào.