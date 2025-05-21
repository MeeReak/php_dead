<?php

$host = 'localhost';
$user = 'root';
$password = '1234!@#$'; // Change if needed
$database = 'eco'; // Change to your database name

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$Name = "Sanji";
$Sex = 0;
$Email = "testing@gmail.com";
$Phone = "1212332434575";
$Password = strval(rand(10000000, 99999999));

$sql = "INSERT INTO users(Name, sex, email, phone, password) VALUES ('$Name', '$Sex', '$Email', '$Phone', '$Password')";
if ($conn->query($sql) === TRUE) {
    echo "User registered successfully.<br>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
