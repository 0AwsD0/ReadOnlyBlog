<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbName = 'ReadOnlyBlog';
try{
$conn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
}
catch(Exception $e){
    echo($e);
}
//$conn = null;
?>
