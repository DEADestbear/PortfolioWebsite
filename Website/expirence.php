<?php
session_start(); // Start the session if not already started
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="reset.css" type="text/css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="MainCSS.css" type="text/css" />
    <link rel="stylesheet" href="mobile.css" media="screen and (max-width: 768px)"/>
    <title>Experience</title>
</head>
<body>
    <div class="grid">
        <header class="containerHeader">
            <h1>Mr Jack Morray</h1>
            <nav>
                <ul class="read">
                    <li class="nav"><a href="my_homepage.php" class="mainLink">About Me</a></li>
                    <li class="nav"><a href="portfolio.php" class="mainLink">Portfolio</a></li>
                    <li class='nav'><a href="addEntry.php" class="mainLink">Add Entry</a></li>
                <?php if (isset($_SESSION['email'])): ?>
                    <li class="nav"><a href="logout.php" class="mainLink">Logout</a></li>
                <?php else: ?>
                    <li class="nav"><a href="Login.html" class="mainLink">Login</a></li>
                <?php endif; ?>
                    <il class="nav"><a href="viewBlog.php" class="mainLink">Blog</a></il>
                </ul>
            </nav>
        </header>
    

        <main>            
        <div class="education" id="education">
            <h2>Education</h2>
            <br>
            <h3>The City Academy Hackney -</h3>
            <p>
                I attended The City Academy Hackney for my secondary education. I studied a range of subjects, including Computer Science, Mathematics, and English Literature.
            </p>
            <br>
            <h3>Queen Mary University London - </h3>
            <p>
                I am currently studying Computer Science at Queen Mary University London. I have a strong interest in technology and enjoy learning about new developments in the field.
            </p>
        </div>
        <div class="skills" id="skills">
            <h2>Skills</h2>
            <ul>
                <li>Programming languages: Java, Python, C++</li>
                <li>Web development: HTML, CSS, JavaScript</li>
                <li>Database management: SQL</li>
                <li>Operating systems: Windows, Linux</li>
                <li>Version control: Git</li>
            </ul>
        </div>
        <div class="experience" id="experience">
            <h2>Experience</h2>
            <br>
            <p>N/A</p>
        </div>


        </main>
        <footer>
            <p>&copy; 2025 Jack Morray</p>
        </footer>
    </div>

</body>
</html>