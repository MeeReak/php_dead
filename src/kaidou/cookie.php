<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] != "POST" && !isset($_COOKIE['name'])) {
    setcookie('name', "Kaidou", time() + 10, "/src/kaidou/cookie.php");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_COOKIE['name'])) {
        $message = $_COOKIE['name'];
    } else {
        $message = "No cookie found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cookie</title>
</head>

<body style="background: grey">

    <form action="" method="POST">
        <br><button type="submit">Get Cookie</button>
    </form>

    <?php if ($message): ?>
        <h3><?= htmlspecialchars($message) ?></h3>
    <?php endif; ?>

</body>

</html>