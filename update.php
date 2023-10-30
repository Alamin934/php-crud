<?php include 'header.php'; include 'config.php';?>
<div id="main-content">
    <h2>Update Record</h2>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" value="<?php if($_POST){echo $_POST['sid'];} ?>"/>
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>
    <?php
    if(isset($_POST['showbtn'])){
        $std_id = $_POST['sid'];
    
        $sql = "SELECT * FROM students WHERE sid = {$std_id}";
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessfull");
    
        if(mysqli_num_rows($result)){
            while($row = mysqli_fetch_assoc($result)){
    
    ?>
    <form class="post-form mt-4" action="updatedata.php" method="post">
        <div class="form-group">
            <label for="">Name</label>
            <input type="hidden" name="sid"  value="<?php echo $row['sid']; ?>" />
            <input type="text" name="sname" value="<?php echo $row['sname']; ?>" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" value="<?php echo $row['saddress']; ?>" />
        </div>
        <div class="form-group">
        <label>Class</label>
        <?php 
        $c_sql = "SELECT * FROM student_class";
        $c_query = mysqli_query($conn, $c_sql) or die("Unsuccessful Query");
        if(mysqli_num_rows($c_query) > 0): ?>
            <select name="sclass">
        <?php 
            while($c_info = mysqli_fetch_assoc($c_query)):
                if($c_info['cid'] == $row['sclass']){
                    $selected='selected';
                }else{
                    $selected='';
                }
        ?>
                <option value="<?php echo $c_info['cid'] ?>" <?php echo $selected; ?>><?php echo $c_info['cname']; ?></option>
            <?php endwhile; ?>
            </select>
        <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" value="<?php echo $row['sphone']; ?>" />
        </div>
        <input class="submit" type="submit" value="Update"  />
    </form>
    <?php 
            }
        }else{echo "<h2 style='text-align: center;'>Data Not Found with Id = {$std_id}</h2>";}
    } 
 ?>
</div>
</div>
</body>
</html>
