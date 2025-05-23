<?php

$host = 'localhost';
$name = 'root';
$password = '1234!@#$';
$database_name = 'eco';

$conn = new mysqli($host, $name, $password, $database_name);

if ($conn->connect_error) {
    echo "Failed to connect database!";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $code = $_POST['code'];
    $phone_number = $_POST['phone_number'];
    $password = strval(rand(10000000, 99999999));

    $sql = "INSERT INTO users(Name, sex, email, phone, password) value ('$name','$gender','$email','$code$phone_number','$password')";
    if ($conn->query($sql)) {
        echo "Success";
    } else {
        echo "Failed";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Create User</title>
</head>

<body style="background: grey">
    <form
        method="POST"
        enctype="multipart/form-data">
        <label>Name</label>
        <input type="text" required name="name" /><br />
        <label>Gender</label>
        <input type="radio" id="male" name="gender" value="0">
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="1">
        <label for="female">Female</label><br>
        <label>Email</label>
        <input type="text" required name="email" /><br />
        <label>Phone Number</label>
        <select name="code" id="code">
            <option value="77">77</option>
            <option value="855">855</option>
        </select>
        <input type="text" required name="phone_number" /><br />
        <br />
        <button type="submit">Upload</button>
    </form>
</body>

</html>