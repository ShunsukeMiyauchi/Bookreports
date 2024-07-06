<?php  
// Database configuration  
define('DB_HOST', '127.0.0.1'); 
define('DB_USERNAME', 'dbuser'); 
define('DB_PASSWORD', 'Levtech1524'); 
define('DB_NAME', 'reports'); 
  
// Create database connection  
$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);  
  
// Check connection  
if ($db->connect_error) { 
    die("Connection failed: " . $db->connect_error);  
}