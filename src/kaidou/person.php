<?php

function ConnectDB()
{
    $host = 'localhost';
    $user = 'root';
    $password = '1234!@#$';
    $database = 'eco';

    $conn = new mysqli($host, $user, $password, $database);

    if ($conn->connect_error) {
        echo "Connect to db Failed!!";
        exit;
    }

    return $conn;
}

function GetAll()
{
    $conn = ConnectDB();

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

function Add($name, $city)
{
    $conn = ConnectDB();

    $sql = "INSERT INTO persons(Name, City) VALUE ('$name', '$city')";
    $result = $conn->query($sql);

    if (!$result) {
        echo "Failed to insert new persons";
        exit;
    }
    $conn->close();
}

function Update($id, $name, $city)
{
    $conn = ConnectDB();

    $sql = "UPDATE persons SET Name = '$name', City = '$city' WHERE Id = '$id'";
    $result = $conn->query($sql);

    if (!$result) {
        echo "Failed to update persons";
        exit;
    }
    $conn->close();
}

function Delete($id)
{
    $conn = ConnectDB();

    $sql = "DELETE persons WHERE Id = '$id'";
    $result = $conn->query($sql);

    if (!$result) {
        echo "Failed to delete persons";
        exit;
    }
    $conn->close();
}
