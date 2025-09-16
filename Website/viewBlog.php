<?php
 // Start the session
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

$sql = "SELECT * FROM post"; //select all posts from the post table
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    header("Location: addEntry.php");
    exit();
}

// Fetch all rows into an array
$posts = [];
while ($row = $result->fetch_assoc()) {
    $posts[] = $row;
}

// Bubble sort algorithm to sort posts by 'time' in descending order
for ($i = 0; $i < count($posts) - 1; $i++) {
    for ($j = 0; $j < count($posts) - $i - 1; $j++) {
        if (strtotime($posts[$j]['time']) < strtotime($posts[$j + 1]['time'])) {
            // Swap the posts
            $temp = $posts[$j];
            $posts[$j] = $posts[$j + 1];
            $posts[$j + 1] = $temp;
        }
    }
}

$conn->close();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="reset.css" type="text/css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="MainCSS.css" type="text/css" />
    <link rel="stylesheet" href="mobile.css" media="screen and (max-width: 768px)"/>
    <script src="blogForum.js" defer></script>

    <title>Document</title>
</head>
<body>
    <div class="grid">
    <header class="containerHeader">
        <h1>Mr Jack Morray</h1>
        
        <nav>
            <ul class="read">
                <li class="nav"><a href="my_homepage.php" class="mainLink">About Me</a></li>
                <li class="nav"><a href="Expirence.php" class="mainLink" >Expirence</a></li>
                <li class="nav"><a href="portfolio.php" class="mainLink">Portfolio</a></li>
                <li class='nav'><a href="addEntry.php" class="mainLink">Add Entry</a></li>
                <?php if (isset($_SESSION['email'])): ?>
                    <li class="nav"><a href="logout.php" class="mainLink">Logout</a></li>
                <?php else: ?>
                    <li class="nav"><a href="login.html" class="mainLink">Login</a></li>
                <?php endif; ?>
                
                
            </ul>
        </nav>    
        
    </header>
    
    <main>
        
    <?php
        foreach ($posts as $row) {
            echo "<div class='blogPost'>";
            echo "  <h3>" . $row['title'] . "</h3>";
            echo "  <p>" . $row['content'] . "</p>";
            echo "  <p><em>Posted on : " . $row['time'] . " (UTC)</em></p>";
            echo "</div>";
        }
    ?>

        <footer>
            <p>&copy; 2025 Jack Morray</p>
        </footer>
    </main>
    </div>
</body>
</html>