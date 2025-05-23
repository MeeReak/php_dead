<?php

$message = 'Click the button to get Session';

if (!is_dir('C:/Mee/Coding/Script/php_dead/session')) {
    mkdir('C:/Mee/Coding/Script/php_dead/session');
}
session_save_path("C:/Mee/Coding/Script/php_dead/session");
session_start();


if ($_SERVER["REQUEST_METHOD"] != "POST" && !isset($_SESSION['student_name'])) {
    $_SESSION['student_name'] = "Zoro";
    $_SESSION['email'] = "zoro@gmail.com";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['student_name'])) {
        $message = $_SESSION['student_name'] . " and " . $_SESSION['email'];
    } else {
        $message = "Session not found.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Session</title>
</head>

<body style="background: grey">

    <form action="" method="POST">
        <br><button type="submit">Get Session</button>
    </form>

    <?php if ($message): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

</body>

</html>