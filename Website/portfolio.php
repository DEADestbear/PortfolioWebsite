<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="reset.css" type="text/css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="MainCSS.css" type="text/css" />
    <link rel="stylesheet" href="mobile.css" media="screen and (max-width: 768px)"/>
    <title>Portfolio</title>
</head>
<body>
    <div class="grid">
        <header class="containerHeader">
            <h1>Mr Jack Morray</h1>
            <nav>
                <ul class="read">
                    <li class="nav"><a href="my_homepage.php" class="mainLink">About Me</a></li>
                    <li class="nav"><a href="expirence.php" class="mainLink" >Expirence</a></li>
                    <li class='nav'><a href="addEntry.php" class="mainLink">Add Entry</a></li>
                <?php if (isset($_SESSION['email'])): ?>
                    <li class="nav"><a href="logout.php" class="mainLink">Logout</a></li>
                <?php else: ?>
                    <li class="nav"><a href="login.html" class="mainLink">Login</a></li>
                <?php endif; ?>
                    <il class="nav"><a href="viewBlog.php" class="mainLink">Blog</a></il>
                    
                </ul>
            </nav>
        </header>

        <main>
            <section id="my_Cv" class="cv">
                <h2>Portfolio</h2>
                <p><a href="Jack Morray's CV.pdf" download class="outLink">Download my CV</a></p>
                <p><a href="https://github.com/DEADestbear" class="outLink">My github</a></p>
                <p><a href="https://www.linkedin.com/in/jack-morray-03b421275/" class="outLink">linkedIn</a></p>
            </section>
            <div id="project" class="project">
                <h2>Projects</h2>
                <p>(These are currently just for show)</p>
                <ul>
                    <li>Project 1: <a href="#">Chess Ai</a></li>
                    <li>Project 2: <a href="#">Portfolio Website</a></li>
                </ul>
            </div>
        </main>
        <footer>
            <p>&copy; 2025 Jack Morray</p>
        </footer>
        
    </div>
        
</body>
</html>