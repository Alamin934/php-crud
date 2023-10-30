<?php 
include 'config.php';

$std_id = $_GET['id'];

$sql = "DELETE FROM students WHERE sid = {$std_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessfull");

header("Location: http://localhost/php_project/crud");


mysqli_close($conn);