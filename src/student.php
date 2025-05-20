<!-- <?php

        $host = 'localhost';
        $user = 'root';
        $pass = '1234!@#$';
        $database = 'eco';

        $conn = new mysqli($host, $user, $pass, $database);

        if ($conn->connect_error) {
            echo "Connection Field" . $conn->connect_error;
        }

        $name = "Luffy";
        $email = 'testing@gmail.com';

        $stmt = $conn->prepare("SELECT * From Users Where Name = ? AND  Email = ?");
        $stmt->bind_param("ss", $name, $email);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Found!";
        } else {
            echo "Not Found!";
        }


        $stmt->close();
        $conn->close();
        ?> -->

<?php
$host = 'localhost';
$user = 'root';
$pass = '1234!@#$';
$database = 'eco';

$conn = new mysqli($host, $user, $pass, $database);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';

    // $stmt = $conn->prepare("SELECT * FROM Users WHERE Name = ? AND Email = ?");
    // $stmt->bind_param("ss", $name, $email);
    // $stmt->execute();

    // $result = $stmt->get_result();

    // if ($result->num_rows > 0) {
    //     $message = "Found!";
    // } else {
    //     $message = "Not Found!";
    // }

    // $stmt->close();
    $sql = "SELECT * FROM Users WHERE Name = '$name' AND Email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $message = "Found!";
    } else {
        $message = "Not Found!";
    }
    $result->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Search User</title>
</head>

<body>

    <h2>Search User</h2>

    <form method="post" action="">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>

        <button type="submit">Search</button>
    </form>

    <?php if ($message): ?>
        <h3><?= htmlspecialchars($message) ?></h3>
    <?php endif; ?>

</body>

</html>