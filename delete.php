<?php 
    include 'header.php'; 
    include 'config.php';

    
    $error = '';

    if(isset($_POST['deletebtn'])){
        $std_id = $_POST['sid'];

        $std_sql = "SELECT * FROM students";
        $std_result = mysqli_query($conn, $std_sql) or die("Query Unsuccessfull");

        while($s_info = mysqli_fetch_assoc($std_result)){
            $s_id = $s_info['sid'];
            if($s_id == $std_id){
                $sql = "DELETE FROM students WHERE sid = {$std_id}";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessfull");
                header("Location: http://localhost/php_project/crud");
            }else{ 
                global $error;
                $error = "Id Doesn't Match";
            }
        }

    
    }
    mysqli_close($conn);
?>


<div id="main-content">
    <h2>Delete Record</h2>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="deletebtn" value="Delete" />
    </form>

    <h2 style="text-align: center;"><?php echo $error; ?></h2>
</div>
</div>
</body>
</html>
