<?php 
include 'config.php';

    $std_id = $_POST['sid'];
    $std_name = $_POST['sname'];
    $std_address = $_POST['saddress'];
    $std_class = $_POST['sclass'];
    $std_phone = $_POST['sphone'];

$sql = "UPDATE students SET sid='{$std_id}', sname='{$std_name}', saddress='{$std_address}', sclass='{$std_class}', sphone='{$std_phone}' WHERE sid={$std_id}";

$update_query = mysqli_query($conn, $sql) or die("Query Unsuccessfull");

header("Location: http://localhost/php_project/crud/index.php");

mysqli_close($conn);
?>