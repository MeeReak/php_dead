<?php
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $dob = $_POST['dob'];

    $host = 'localhost';
    $user = 'root';
    $password = '1234!@#$';
    $database = 'eco';

    $conn = new mysqli($host, $user, $password, $database);
    if ($conn->connect_error) {
        echo "Failed connect to database";
    }

    $sql = "SELECT * FROM student WHERE name = '$name' OR dob = '$dob'";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $message = "Founded";
    } else {
        $message = "Not Founded";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search Page</title>
</head>

<body style="background: gray;">

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="">name</label>
        <input type="text" name="name" required><br>
        <label>date of birth</label>
        <input type="date" name="dob" required><br><br>
        <button type="submit">Find</button>
    </form>

    <?php if ($message): ?>
        <h3><?= htmlspecialchars($message) ?></h3>
    <?php endif; ?>
</body>

</html>