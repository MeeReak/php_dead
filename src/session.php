<?php

$number = strval(rand(10000000, 99999999));
$message = "";
session_start();

if ($_SERVER["REQUEST_METHOD"] != "POST" && !isset($_SESSION['student_name'])) {
    $_SESSION['student_name'] = "Zoro";
    $_SESSION['email'] = "zoro@gmail.com";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['student_name'])) {
        $message = $_SESSION['student_name'] . " and " . $_SESSION['email'];
    } else {
        echo "Session not found.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Session</title>
</head>

<body>
    <form method="post" action="">
        <button type="submit">Get Session</button>
    </form>

    <?php if ($message): ?>
        <h3><?= htmlspecialchars($message) ?></h3>
    <?php endif; ?>
</body>

</html>