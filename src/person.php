<?php
function connectDB()
{
    $host = 'localhost';
    $user = 'root';
    $password = '1234!@#$'; // Change if needed
    $database = 'eco'; // Change to your DB name

    $conn = new mysqli($host, $user, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function getAllUsers()
{
    $conn = connectDB();
    $sql = "SELECT * FROM persons";
    $result = $conn->query($sql);
    $persons = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $persons[] = $row;
        }
    }
    return $persons;
}

function insertUser($name, $email)
{
    $conn = connectDB();
    $sql = "INSERT INTO persons (Name, City) VALUES ('$name', '$email')";
    $conn->query($sql);
    $conn->close();
}

function updateUser($id, $name, $city)
{
    $conn = connectDB();
    $sql = "UPDATE persons SET City = '$city', Name = '$name' WHERE id = '$id'";
    $conn->query($sql);
    $conn->close();
}

function deleteUser($id)
{
    $conn = connectDB();
    $sql = "DELETE FROM persons WHERE id = '$id'";
    $conn->query($sql);
    $conn->close();
}
