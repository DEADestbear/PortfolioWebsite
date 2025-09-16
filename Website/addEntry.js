const express = require('express');
const session = require('express-session');
const path = require('path');

const app = express();

app.use(session({
    secret: 'your_secret_key', // Change this to a secure key
    resave: false,
    saveUninitialized: false
}));

app.use(express.static(path.join(__dirname))); // Serve static files (CSS, JS, etc.)

app.get('/addEntry', (req, res) => {
    if (!req.session.email) {
        return res.redirect('/login.html');
    }

    // Serve the HTML directly, or use a template engine for dynamic content
    res.sendFile(path.join(__dirname, 'addEntry.html'));
});

// ...other routes...

app.listen(3000, () => {
    console.log('Server running on http://localhost:3000');
});