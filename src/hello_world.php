<?php
$filename = "myfile.txt";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['write'])) {
        file_put_contents($filename, '');
        $file = fopen($filename, "a");

        if ($file) {
            for ($i = 0; $i < 1000; $i++) {
                fwrite($file, $i . " Hello World!\n");
            }
            fclose($file);
            $message = "Successfully wrote 1000 lines to $filename";
        }
    }

    if (isset($_POST['read'])) {
        if (file_exists($filename)) {
            $message = nl2br(htmlspecialchars(file_get_contents($filename)));
        } else {
            $message = "File does not exist.";
        }
    }

    if (isset($_POST['delete'])) {
        $file = fopen($filename, "w");

        if ($file) {
            fwrite($file, "Clear os hz!!");
            fclose($file);
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Hello World File</title>
</head>

<body>
    <form method="post" action="">
        <button type="submit" name="write">Write File</button>
        <button type="submit" name="read">Read File</button>
        <button type="submit" name="delete">Read File</button>
    </form>

    <?php if ($message): ?>
        <pre><?= $message ?></pre>
    <?php endif; ?>
</body>

</html>