<?php
session_start(); // Start the session if not already started
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session to log out the user
header("Location: login.html"); // Redirect to the login page

?>