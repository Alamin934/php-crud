<?php 
include 'config.php';

    $std_name = $_POST['sname'];
    $std_address = $_POST['saddress'];
    $std_class = $_POST['class'];
    $std_phone = $_POST['sphone'];

$sql = "INSERT INTO students(sname,saddress,sclass,sphone) VALUES('{$std_name}','{$std_address}','{$std_class}','{$std_phone}')";
$add_query = mysqli_query($conn, $sql) or die("Query Unsuccessfull");

header("Location: http://localhost/php_project/crud/index.php");

mysqli_close($conn);
?>