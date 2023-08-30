<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbName = 'ReadOnlyBlog';
try{
$conn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    $conn = null;
}
//$conn = null;
?>
