<?php
session_start(); // Start the session if not already started
?>

<!DOCTYPE html>
<html lang="en">
<head> <!-- This is the head of the webpage, it contains the title of the webpage, the css files that are linked to the webpage, and the meta tags that are used to define the character set and the viewport of the webpage -->
    <link rel="stylesheet" href="reset.css" type="text/css" /> <!-- reset.css allows for web page layout to be the same accross all web browersers as they have diffrent defult values -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Homepage</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide"> <!-- This is a link to the google font Audiowide -->
    <link rel="stylesheet" href="MainCSS.css" type="text/css" />  <!-- This is a link to the main css file that is used to style the webpage -->
    <link rel="stylesheet" href="mobile.css" media="screen and (max-width: 768px)"/> <!--This is a link to the mobile css file that is used to style the webpage when the screen width is less than 1000px -->
</head>

<body> <!--This is the body of the webpage, it contains the content of the webpage--> 
    <div class="grid">
        <header class="containerHeader"> <!-- This is the header of the webpage, it is a semantic element as it descibes it purpouse as well as the type of content inside --> 
            <h1>Mr Jack Morray</h1>
           <nav> <!-- This is a nav element, it is also a semantic element as it descibes it purpouse as well as the type of content inside -->
                <ul class="read">
                    <li class="nav"><a href="expirence.php" class="mainLink" >Expirence</a></li>
                    <li class="nav"><a href="portfolio.php" class="mainLink">Portfolio</a></li>
                    <li class='nav'><a href="addEntry.php" class="mainLink">Add Entry</a></li>
                <?php if (isset($_SESSION['email'])): ?>
                    <li class="nav"><a href="logout.php" class="mainLink">Logout</a></li>
                <?php else: ?>
                    <li class="nav"><a href="login.html" class="mainLink">Logins</a></li>
                <?php endif; ?>
                    <il class="nav"><a href="viewBlog.php" class="mainLink">Blog</a></il>
                </ul>
            </nav>
        </header>

        <main>
            <div class="aboutMeContainer">
                
                <div class="image">
                    <figure>
                        <img src="IMG_5174.jpg" alt="Jack Morray" width="200" height="200" class="picMe"/>
                    </figure>
                </div>
                <article class="aboutMe" id="about_me"> <!-- article is also a semantic element -->
                    <h2>About Me</h2>
                    <p>
                        I am a student at Queen Mary University London, studying Computer Science. I am a hardworking and passionate learner who enjoys exploring new technologies.
                        In my free time, I love reading books, watching movies, and playing video games. I also enjoy hiking and discovering new places.
                    </p>
                </article>
            </div>
            

            <div class="hobbies" id="my_hobbies" >
                <h2>Expirence</h2>
                <p>
                    I have many hobbies, including reading books, watching movies, and playing video games. I also enjoy hiking and exploring new places. Staying active and engaged is important to me.
                </p>
            </div>

            <section id="links" class="links">
                <h2>Contacts</h2>
                <ul>
                    <li>Personal email: Jmorray11@gmail.com</li>
                    <li>University email: ec24508@qmul.ac.uk</li>
                    <li>Phone number: +447554002628</li>
                </ul>
            </section>

            
            
        </main>
        <footer>
            <p>&copy; 2025 Jack Morray</p>
        </footer>
        
    </div>


    


</body>
</html>
