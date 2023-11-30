<?php
require('../logs/log.php');
$host = 'localhost';
$username = 'root';
$password = '';
$dbName = 'ReadOnlyBlog';
try{
$conn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
}
catch(PDOException $e) {
    echo ("Error: " . $e->getMessage());
    add_into_log('error', 'dbconn ERROR! - '.$e->getMessage());
    $conn = null;
}
?>
