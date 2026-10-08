<?php
$servername = "localhost";
$username   = "root";     // MySQL Username
$password   = "";         // MySQL Password
$dbname     = "tech_company";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name  = $_POST['name'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];

    $sql = "INSERT INTO contacts (name, email, phone) VALUES ('$user_name', '$user_email', '$user_phone')";

    if ($conn->query($sql) === TRUE) {
        header("Location: contact.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>