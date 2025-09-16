
<?php
session_start();


$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "blog"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$sql = "SELECT * FROM users WHERE email = '".$_POST['email']."' AND password = '".$_POST['password']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User exists, redirect to addPost.php
    $_SESSION['email'] = $_POST['email'];
    header("Location: addEntry.php");
    exit();
} else {
    // User does not exist, redirect to login.php
    header("Location: login.html?error=1");
    exit();
}
$conn->close();
// login.php

?>
