<html>

<head>
</head>

<body>

    <h4> PHP Calc </h4>

    <form action='index.php' method='post'>
        <input type='text' id='input' name='input' />
        <input type='submit' />
        <?php

        if (isset($_POST['input'])) {
            if (!preg_match('/[a-zA-Z`]/', $_POST['input'])) {
                print '<fieldset><legend>Result</legend>';
                eval ('print ' . $_POST['input'] . ";");
                print '</fieldset>';
            } else
                echo "<p>Dangerous code detected</p>";
        }
        ?>
    </form>
</body>

</html>