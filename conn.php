<?php 

// Database connection parameters
$host = 'localhost';  // Change this to your database server host
$username = 'your_username';  // Change this to your database username
$password = 'your_password';  // Change this to your database password
$database = 'your_database';  // Change this to your database name

// Create a database connection
$mysqli = new mysqli($host, $username, $password, $database);
