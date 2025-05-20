<?php

$number = strval(rand(10000000, 99999999));
$message = "";

if ($_SERVER["REQUEST_METHOD"] != "POST" && !isset($_COOKIE['name'])) {
    setcookie("name", $number, time() + 10, "/"); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_COOKIE['name'])) {
        $message = $_COOKIE['name'];
    } else {
        $message = "No cookie found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cookie</title>
</head>
<body>
    <form method="post" action="">
        <button type="submit">Get Cookie</button>
    </form>

    <?php if ($message): ?>
        <h3><?= htmlspecialchars($message) ?></h3>
    <?php endif; ?>
</body>

</html>