const express = require('express');
const session = require('express-session');
const path = require('path');
const mysql = require('mysql2');
const app = express();

app.use(express.urlencoded({ extended: true }));
app.use(express.static(__dirname));

app.use(session({
    secret: 'your_secret_key', // Change this!
    resave: false,
    saveUninitialized: false
}));

// MySQL connection
const db = mysql.createConnection({
    host: '127.0.0.1',
    user: 'root',
    password: '',
    database: 'blog'
});

// Middleware to protect routes
function requireLogin(req, res, next) {
    if (!req.session.email) {
        return res.redirect('/Login.html');
    }
    next();
}

// Serve static HTML pages
app.get('/', (req, res) => res.sendFile(path.join(__dirname, 'my_homepage.html')));
app.get('/addEntry', requireLogin, (req, res) => res.sendFile(path.join(__dirname, 'addEntry.html')));
app.get('/portfolio', requireLogin, (req, res) => res.sendFile(path.join(__dirname, 'portfolio.html')));
app.get('/expirence', requireLogin, (req, res) => res.sendFile(path.join(__dirname, 'expirence.html')));

// Login route
app.post('/login', (req, res) => {
    const { email, password } = req.body;
    db.execute(
        'SELECT * FROM users WHERE email = ? AND password = ?',
        [email, password],
        (err, results) => {
            if (err) return res.status(500).send('Database error');
            if (results.length > 0) {
                req.session.email = email;
                res.redirect('/addEntry');
            } else {
                res.redirect('/Login.html?error=1');
            }
        }
    );
});

// Logout route
app.get('/logout', (req, res) => {
    req.session.destroy(() => {
        res.redirect('/Login.html');
    });
});

// Add post route
app.post('/addPost', requireLogin, (req, res) => {
    const { title, content } = req.body;
    db.execute(
        'INSERT INTO post (title, content, time) VALUES (?, ?, UTC_TIMESTAMP())',
        [title, content],
        (err) => {
            if (err) return res.status(500).send('Error: ' + err.message);
            res.redirect('/viewBlog');
        }
    );
});

// View blog route
app.get('/viewBlog', (req, res) => {
    db.query('SELECT * FROM post', (err, results) => {
        if (err) return res.status(500).send('Database error');
        // Sort posts by time descending
        results.sort((a, b) => new Date(b.time) - new Date(a.time));
        // Render HTML with posts (simple, no template engine)
        let postsHtml = results.map(row =>
            `<div class='blogPost'>
                <h3>${row.title}</h3>
                <p>${row.content}</p>
                <p><em>Posted on : ${row.time} (UTC)</em></p>
            </div>`
        ).join('');
        res.send(`
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <link rel="stylesheet" href="reset.css" type="text/css" />
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="MainCSS.css" type="text/css" />
                <link rel="stylesheet" href="mobile.css" media="screen and (max-width: 768px)"/>
                <script src="blogForum.js" defer></script>
                <title>Blog</title>
            </head>
            <body>
                <div class="grid">
                    <header class="containerHeader">
                        <h1>Mr Jack Morray</h1>
                        <nav>
                            <ul class="read">
                                <li class="nav"><a href="my_homepage.html" class="mainLink">About Me</a></li>
                                <li class="nav"><a href="expirence.html" class="mainLink">Expirence</a></li>
                                <li class="nav"><a href="portfolio.html" class="mainLink">Portfolio</a></li>
                                <li class="nav"><a href="addEntry" class="mainLink">Add Entry</a></li>
                                <li class="nav"><a href="logout" class="mainLink">Logout</a></li>
                            </ul>
                        </nav>
                    </header>
                    <main>
                        ${postsHtml}
                    </main>
                    <footer>
                        <p>&copy; 2025 Jack Morray</p>
                    </footer>
                </div>
            </body>
            </html>
        `);
    });
});

app.listen(3000, () => {
    console.log('Server running on http://localhost:3000');
});