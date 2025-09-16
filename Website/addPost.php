<?php

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "blog"; // Replace with your database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $stmt = $conn->prepare("INSERT INTO post (title, content, time) VALUES (?, ?, UTC_TIMESTAMP())");
    $stmt->bind_param("ss", $_POST['title'], $_POST['content']);

    if($stmt->execute()){
        header("Location: viewBlog.php");
    }else{
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

?>